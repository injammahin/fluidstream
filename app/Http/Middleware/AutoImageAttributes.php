<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AutoImageAttributes
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        $contentType = $response->headers->get('Content-Type', '');

        if (
            !str_contains($contentType, 'text/html') ||
            !method_exists($response, 'getContent') ||
            !method_exists($response, 'setContent')
        ) {
            return $response;
        }

        $html = $response->getContent();

        if (!$html || !str_contains($html, '<img')) {
            return $response;
        }

        $imageIndex = 0;

        $html = preg_replace_callback('/<img\b([^>]*)>/i', function ($matches) use (&$imageIndex) {
            $imageIndex++;

            $attributes = $matches[1];

            /*
             * Skip images that should NOT be lazy-loaded:
             * - first 2 images, usually logo/hero
             * - images already marked eager/high priority
             * - images with no-lazy or data-no-lazy
             * - hero images
             */
            $shouldSkipLazy = false;

            if ($imageIndex <= 2) {
                $shouldSkipLazy = true;
            }

            if (preg_match('/\bloading\s*=/i', $attributes)) {
                $shouldSkipLazy = true;
            }

            if (preg_match('/\bfetchpriority\s*=\s*["\']high["\']/i', $attributes)) {
                $shouldSkipLazy = true;
            }

            if (preg_match('/\bdata-no-lazy\b/i', $attributes)) {
                $shouldSkipLazy = true;
            }

            if (preg_match('/\b(class|id)\s*=\s*["\'][^"\']*(hero|logo|no-lazy|above-fold)[^"\']*["\']/i', $attributes)) {
                $shouldSkipLazy = true;
            }

            /*
             * Add decoding="async" if missing.
             */
            if (!preg_match('/\bdecoding\s*=/i', $attributes)) {
                $attributes .= ' decoding="async"';
            }

            /*
             * Add loading="lazy" only to below-fold images.
             */
            if (!$shouldSkipLazy) {
                $attributes .= ' loading="lazy"';
            }

            return '<img' . $attributes . '>';
        }, $html);

        $response->setContent($html);

        return $response;
    }
}