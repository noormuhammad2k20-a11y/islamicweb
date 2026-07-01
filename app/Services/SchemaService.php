<?php

namespace App\Services;

class SchemaService
{
    /**
     * Generate WebSite schema for homepage
     */
    public static function website(): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'WebSite',
            'name' => 'NoorIslam',
            'alternateName' => 'نورِ اسلام',
            'url' => config('app.url', 'https://noorislam.com'),
            'description' => 'Pakistan Ka Sabse Behtar Islami Website — Quran, Duas, Namaz Timings, Islamic Names',
            'inLanguage' => ['ur', 'en', 'ar'],
            'potentialAction' => [
                '@type' => 'SearchAction',
                'target' => config('app.url') . '/search?q={search_term_string}',
                'query-input' => 'required name=search_term_string',
            ],
            'publisher' => self::organization(),
        ];
    }

    /**
     * Generate Organization schema
     */
    public static function organization(): array
    {
        return [
            '@type' => 'Organization',
            'name' => 'NoorIslam',
            'url' => config('app.url', 'https://noorislam.com'),
            'logo' => asset('favicon.svg'),
        ];
    }

    /**
     * Generate Article schema
     */
    public static function article(string $title, string $description, string $url, ?string $datePublished = null, ?string $author = null): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'Article',
            'headline' => $title,
            'description' => $description,
            'url' => $url,
            'datePublished' => $datePublished ?? now()->toIso8601String(),
            'dateModified' => now()->toIso8601String(),
            'author' => [
                '@type' => 'Person',
                'name' => $author ?? 'NoorIslam Editorial',
            ],
            'publisher' => self::organization(),
            'inLanguage' => 'ur',
        ];
    }

    /**
     * Generate FAQPage schema (useful for prayer times, name meanings)
     */
    public static function faqPage(array $faqs): array
    {
        $entities = [];
        foreach ($faqs as $question => $answer) {
            $entities[] = [
                '@type' => 'Question',
                'name' => $question,
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => $answer,
                ],
            ];
        }

        return [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => $entities,
        ];
    }

    /**
     * Generate Event schema (for prayer times, Islamic events)
     */
    public static function event(string $name, string $startDate, string $location, ?string $description = null): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'Event',
            'name' => $name,
            'startDate' => $startDate,
            'description' => $description,
            'location' => [
                '@type' => 'Place',
                'name' => $location,
            ],
            'organizer' => self::organization(),
        ];
    }

    /**
     * Generate BreadcrumbList schema
     */
    public static function breadcrumb(array $items): array
    {
        $list = [];
        foreach ($items as $index => $item) {
            $list[] = [
                '@type' => 'ListItem',
                'position' => $index + 1,
                'name' => $item['name'],
                'item' => $item['url'] ?? null,
            ];
        }

        return [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => $list,
        ];
    }

    /**
     * Encode schema to JSON for embedding in <script> tags
     */
    public static function toJson(array $schema): string
    {
        return json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    }
}
