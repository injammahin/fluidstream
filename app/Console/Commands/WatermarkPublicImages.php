<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Intervention\Image\Alignment;
use Intervention\Image\Laravel\Facades\Image;

class WatermarkPublicImages extends Command
{
    protected $signature = 'media:watermark-public-images {--dry-run : Show files only, do not change anything}';

    protected $description = 'Backup public images and replace them with watermarked versions';

    public function handle(): int
    {
        $sourceRoot = public_path('img');
        $backupRoot = storage_path('app/private/img-original-backup');

        /*
            Your watermark is now inside:
            public/img/insights/watermark.png

            This code also supports:
            public/img/watermark.png
        */
        $possibleWatermarks = [
            public_path('img/watermark.png'),
            public_path('img/insights/watermark.png'),
        ];

        $watermarkPath = collect($possibleWatermarks)->first(function ($path) {
            return File::exists($path);
        });

        if (!File::exists($sourceRoot)) {
            $this->error("Image folder not found: {$sourceRoot}");
            return self::FAILURE;
        }

        if (!$watermarkPath) {
            $this->error('Watermark file not found.');
            $this->line('Put watermark.png in one of these locations:');
            $this->line('public/img/watermark.png');
            $this->line('public/img/insights/watermark.png');
            return self::FAILURE;
        }

        $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];

        $watermarkRealPath = realpath($watermarkPath);

        $files = collect(File::allFiles($sourceRoot))
            ->filter(function ($file) use ($allowedExtensions, $watermarkRealPath) {
                $extension = strtolower($file->getExtension());
                $fileName = strtolower($file->getFilename());
                $realPath = realpath($file->getPathname());

                if (!in_array($extension, $allowedExtensions, true)) {
                    return false;
                }

                if ($realPath === $watermarkRealPath) {
                    return false;
                }

                /*
                    Skip logos and icons.
                    You do not want to watermark the website logo, favicon, or watermark itself.
                */
                if (
                    str_contains($fileName, 'logo') ||
                    str_contains($fileName, 'favicon') ||
                    str_contains($fileName, 'watermark') ||
                    str_contains($fileName, 'apple-touch-icon')
                ) {
                    return false;
                }

                return true;
            });

        if ($files->isEmpty()) {
            $this->warn('No images found for watermarking.');
            return self::SUCCESS;
        }

        $this->info('Watermark file: ' . $watermarkPath);
        $this->info('Images found: ' . $files->count());

        foreach ($files as $file) {
            $sourcePath = $file->getPathname();
            $relativePath = str_replace($sourceRoot . DIRECTORY_SEPARATOR, '', $sourcePath);
            $backupPath = $backupRoot . DIRECTORY_SEPARATOR . $relativePath;
            $extension = strtolower($file->getExtension());

            if ($this->option('dry-run')) {
                $this->line('Would watermark: public/img/' . $relativePath);
                continue;
            }

            try {
                File::ensureDirectoryExists(dirname($backupPath));

                /*
                    Backup original clean image only once.
                    After this, the command always uses this backup as the clean source.
                    So running the command again will not double-watermark the image.
                */
                if (!File::exists($backupPath)) {
                    File::copy($sourcePath, $backupPath);
                }

                $image = Image::decode(file_get_contents($backupPath));

                /*
                    Keep images web-friendly.
                    Large images will be reduced to max 1800px width.
                    Smaller images stay as they are.
                */
                $image->scaleDown(width: 1800);

                /*
                    Make watermark responsive to image width.
                    Big image = bigger watermark.
                    Small image = smaller watermark.
                */
                $watermarkWidth = max(140, min(360, (int) round($image->width() * 0.23)));

                $watermark = Image::decode(file_get_contents($watermarkPath));
                $watermark->scaleDown(width: $watermarkWidth);

                /*
                    Add watermark at bottom-right.
                    Last value .30 means 30% opacity.
                */
                $image->insert(
                    image: $watermark,
                    x: 30,
                    y: 30,
                    alignment: Alignment::BOTTOM_RIGHT,
                    transparency: 0.30
                );

                $encoded = $image->encodeUsingFileExtension($extension, quality: 82);

                File::put($sourcePath, (string) $encoded);

                $this->info('Watermarked: public/img/' . $relativePath);
            } catch (\Throwable $e) {
                $this->error('Failed: public/img/' . $relativePath);
                $this->error($e->getMessage());
            }
        }

        $this->newLine();
        $this->info('Done.');
        $this->line('Original clean image backup location:');
        $this->line($backupRoot);

        return self::SUCCESS;
    }
}