<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Symfony\Component\Process\Process;

class WatermarkPublicVideos extends Command
{
    protected $signature = 'media:watermark-public-videos {--dry-run : Show videos only, do not change anything}';

    protected $description = 'Backup public videos and replace them with watermarked versions';

    public function handle(): int
    {
        /*
            Your screenshot shows public/video.
            This also supports public/videos if you use that later.
        */
        $possibleVideoFolders = [
            public_path('video'),
            public_path('videos'),
        ];

        $sourceRoot = collect($possibleVideoFolders)->first(function ($path) {
            return File::exists($path);
        });

        $backupRoot = storage_path('app/private/video-original-backup');
        $processingRoot = storage_path('app/private/video-processing');
        $watermarkPath = public_path('img/watermark.png');

        if (!$sourceRoot) {
            $this->error('Video folder not found.');
            $this->line('Create one of these folders:');
            $this->line('public/video');
            $this->line('public/videos');
            return self::FAILURE;
        }

        if (!File::exists($watermarkPath)) {
            $this->error("Watermark file not found: {$watermarkPath}");
            return self::FAILURE;
        }

        $ffmpegCheck = new Process(['ffmpeg', '-version']);
        $ffmpegCheck->run();

        if (!$ffmpegCheck->isSuccessful()) {
            $this->error('FFmpeg is not installed or not available in terminal.');
            $this->line('Install it with: brew install ffmpeg');
            return self::FAILURE;
        }

        /*
            Safe website video formats.
            This command will process MP4/M4V/MOV.
            If you have WEBM, tell me later and I will give a separate WEBM version.
        */
        $allowedExtensions = ['mp4', 'm4v', 'mov'];

        $files = collect(File::allFiles($sourceRoot))
            ->filter(function ($file) use ($allowedExtensions) {
                $extension = strtolower($file->getExtension());
                $fileName = strtolower($file->getFilename());

                if (!in_array($extension, $allowedExtensions, true)) {
                    return false;
                }

                if (
                    str_contains($fileName, 'watermark') ||
                    str_contains($fileName, 'watermarked')
                ) {
                    return false;
                }

                return true;
            });

        if ($files->isEmpty()) {
            $this->warn('No videos found for watermarking.');
            return self::SUCCESS;
        }

        $this->info('Video folder: ' . $sourceRoot);
        $this->info('Watermark file: ' . $watermarkPath);
        $this->info('Videos found: ' . $files->count());

        foreach ($files as $file) {
            $sourcePath = $file->getPathname();
            $relativePath = str_replace($sourceRoot . DIRECTORY_SEPARATOR, '', $sourcePath);
            $backupPath = $backupRoot . DIRECTORY_SEPARATOR . $relativePath;

            $extension = strtolower($file->getExtension());
            $tempOutputPath = $processingRoot . DIRECTORY_SEPARATOR . sha1($relativePath) . '.' . $extension;

            if ($this->option('dry-run')) {
                $this->line('Would watermark: ' . str_replace(public_path() . DIRECTORY_SEPARATOR, 'public/', $sourcePath));
                continue;
            }

            try {
                File::ensureDirectoryExists(dirname($backupPath));
                File::ensureDirectoryExists($processingRoot);

                /*
                    Backup original clean video only once.
                    Running this command again will use the clean backup,
                    so it will not double-watermark the video.
                */
                if (!File::exists($backupPath)) {
                    File::copy($sourcePath, $backupPath);
                }

                if (File::exists($tempOutputPath)) {
                    File::delete($tempOutputPath);
                }

                /*
                    Watermark settings:
                    scale=320:-1     = watermark width 320px
                    aa=0.35          = watermark opacity 35%
                    overlay ... 30   = bottom-right spacing 30px
                */
                $filter = '[1:v]scale=320:-1,format=rgba,colorchannelmixer=aa=0.35[wm];' .
                    '[0:v][wm]overlay=main_w-overlay_w-30:main_h-overlay_h-30';

                $process = new Process([
                    'ffmpeg',
                    '-y',
                    '-i', $backupPath,
                    '-i', $watermarkPath,
                    '-filter_complex', $filter,
                    '-map', '0:v:0',
                    '-map', '0:a?',
                    '-c:v', 'libx264',
                    '-preset', 'medium',
                    '-crf', '23',
                    '-c:a', 'aac',
                    '-b:a', '128k',
                    '-movflags', '+faststart',
                    $tempOutputPath,
                ]);

                $process->setTimeout(null);
                $process->run();

                if (!$process->isSuccessful()) {
                    throw new \RuntimeException($process->getErrorOutput());
                }

                File::copy($tempOutputPath, $sourcePath);
                File::delete($tempOutputPath);

                $this->info('Watermarked: ' . str_replace(public_path() . DIRECTORY_SEPARATOR, 'public/', $sourcePath));
            } catch (\Throwable $e) {
                $this->error('Failed: ' . str_replace(public_path() . DIRECTORY_SEPARATOR, 'public/', $sourcePath));
                $this->error($e->getMessage());
            }
        }

        $this->newLine();
        $this->info('Done.');
        $this->line('Original clean video backup location:');
        $this->line($backupRoot);

        return self::SUCCESS;
    }
}