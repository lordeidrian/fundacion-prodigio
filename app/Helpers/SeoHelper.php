<?php

namespace App\Helpers;

class SeoHelper
{
    /**
     * Generate SEO meta data for a page
     *
     * @param string|null $title
     * @param string|null $description
     * @param string|null $image
     * @param string|null $type
     * @return array
     */
    public static function generate(?string $title = null, ?string $description = null, ?string $image = null, ?string $type = 'website'): array
    {
        $siteName = 'Fundación Prodigio';
        $defaultTitle = $siteName . ' - Transformando vidas a través de la educación';
        $defaultDescription = 'Fundación Prodigio trabaja para mejorar la calidad de vida de niños, niñas y adolescentes en situación de vulnerabilidad a través de programas educativos y de desarrollo comunitario.';
        $defaultImage = asset('file.jpg');

        return [
            'title' => $title ? $title . ' | ' . $siteName : $defaultTitle,
            'description' => $description ?? $defaultDescription,
            'image' => $image ?? $defaultImage,
            'url' => url()->current(),
            'type' => $type,
            'site_name' => $siteName,
        ];
    }

    /**
     * Generate page title based on content
     *
     * @param string|null $title
     * @return string
     */
    public static function title(?string $title = null): string
    {
        $siteName = 'Fundación Prodigio';
        
        if (!$title) {
            return $siteName . ' - Transformando vidas a través de la educación';
        }

        return $title . ' | ' . $siteName;
    }

    /**
     * Clean and truncate description
     *
     * @param string|null $description
     * @param int $maxLength
     * @return string
     */
    public static function description(?string $description = null, int $maxLength = 160): string
    {
        $default = 'Fundación Prodigio trabaja para mejorar la calidad de vida de niños, niñas y adolescentes en situación de vulnerabilidad a través de programas educativos y de desarrollo comunitario.';
        
        if (!$description) {
            return $default;
        }

        // Strip HTML tags
        $clean = strip_tags($description);
        
        // Truncate if needed
        if (strlen($clean) > $maxLength) {
            $clean = substr($clean, 0, $maxLength - 3) . '...';
        }

        return $clean;
    }
}
