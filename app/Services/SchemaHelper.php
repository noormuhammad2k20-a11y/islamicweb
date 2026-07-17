<?php

namespace App\Services;

/**
 * ISSUE 8: Schema.org JSON-LD auto-generation service.
 * Generates structured data for different content types to improve Google rich snippets.
 */
class SchemaHelper
{
    /**
     * Generate Dua page schema (Article + Prayer type).
     */
    public static function duaSchema($dua): array
    {
        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'Article',
            'headline' => $dua->seo_title ?? $dua->title_english ?? $dua->title_roman_urdu,
            'description' => $dua->meta_description ?? $dua->short_meaning,
            'inLanguage' => ['ur', 'en', 'ar'],
            'datePublished' => $dua->created_at ? $dua->created_at->toISOString() : null,
            'dateModified' => $dua->updated_at ? $dua->updated_at->toISOString() : null,
            'author' => ['@type' => 'Organization', 'name' => 'NoorIslam'],
            'publisher' => [
                '@type' => 'Organization',
                'name' => 'NoorIslam',
                'logo' => [
                    '@type' => 'ImageObject',
                    'url' => config('app.url') . '/favicon.svg',
                ],
            ],
            'mainEntityOfPage' => [
                '@type' => 'WebPage',
                '@id' => $dua->canonical_url ?? config('app.url'),
            ],
        ];

        // Add Prayer-specific data if available
        if ($dua->arabic_text) {
            $schema['articleBody'] = strip_tags($dua->arabic_text);
        }

        return $schema;
    }

    /**
     * Generate Surah page schema (Chapter of Book type).
     */
    public static function surahSchema($surah): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'Chapter',
            'name' => "Surah {$surah->name_en}",
            'alternateName' => $surah->name_ar ?? '',
            'position' => $surah->number ?? 0,
            'isPartOf' => [
                '@type' => 'Book',
                'name' => 'The Holy Quran',
                'alternateName' => 'القرآن الكريم',
            ],
            'numberOfPages' => $surah->total_ayahs ?? 0,
            'inLanguage' => 'ar',
            'description' => $surah->effective_meta_description ?? '',
            'url' => route('surah.show', $surah->slug),
        ];
    }

    /**
     * Generate FAQ schema from a collection of Q&A items.
     */
    public static function faqSchema(iterable $faqs): array
    {
        $entities = [];
        foreach ($faqs as $faq) {
            $question = $faq->question ?? ($faq['question'] ?? '');
            $answer = $faq->answer ?? ($faq['answer'] ?? '');
            
            if ($question && $answer) {
                $entities[] = [
                    '@type' => 'Question',
                    'name' => $question,
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => strip_tags($answer),
                    ],
                ];
            }
        }

        if (empty($entities)) {
            return [];
        }

        return [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => $entities,
        ];
    }

    /**
     * Generate Allah Name schema.
     */
    public static function allahNameSchema($name): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'Article',
            'headline' => "{$name->transliteration} ({$name->arabic}) — Name of Allah #{$name->number}",
            'description' => "Meaning: {$name->meaning_english}. Benefits and dhikr method.",
            'inLanguage' => ['en', 'ur', 'ar'],
            'author' => ['@type' => 'Organization', 'name' => 'NoorIslam'],
            'publisher' => [
                '@type' => 'Organization',
                'name' => 'NoorIslam',
                'logo' => [
                    '@type' => 'ImageObject',
                    'url' => config('app.url') . '/favicon.svg',
                ],
            ],
        ];
    }

    /**
     * Generate Hadith schema.
     */
    public static function hadithSchema($hadith): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'Article',
            'headline' => $hadith->slug ? str_replace('-', ' ', $hadith->slug) : 'Hadith',
            'description' => $hadith->english_translation ?? $hadith->urdu_translation ?? '',
            'inLanguage' => ['ar', 'en', 'ur'],
            'author' => ['@type' => 'Organization', 'name' => 'NoorIslam'],
            'publisher' => [
                '@type' => 'Organization',
                'name' => 'NoorIslam',
                'logo' => [
                    '@type' => 'ImageObject',
                    'url' => config('app.url') . '/favicon.svg',
                ],
            ],
            'citation' => $hadith->reference ?? $hadith->book_name ?? '',
        ];
    }

    /**
     * Generate Islamic Name schema.
     */
    public static function islamicNameSchema($name): array
    {
        $desc = "";
        if ($name->meaning_urdu) {
            $desc .= "Matlab: {$name->meaning_urdu}. ";
        }
        if ($name->meaning_english) {
            $desc .= "Meaning: {$name->meaning_english}. ";
        }
        $gender = $name->gender ?? 'Unknown';

        return [
            '@context' => 'https://schema.org',
            '@type' => 'DefinedTerm',
            'name' => $name->name_english ?? $name->name ?? '',
            'alternateName' => $name->name_urdu ?? $name->name_arabic ?? '',
            'termCode' => 'Islamic Name',
            'description' => $desc . "Gender: {$gender}.",
            'inDefinedTermSet' => [
                '@type' => 'DefinedTermSet',
                'name' => 'Islamic Names — NoorIslam',
                'url' => config('app.url') . '/islamic-names'
            ]
        ];
    }

    /**
     * Generate Dream Symbol schema.
     */
    public static function dreamSymbolSchema($symbol): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'Article',
            'articleSection' => 'Islamic Dream Interpretation',
            'headline' => "Khwab mein " . ($symbol->title_urdu ?? $symbol->symbol_urdu ?? '') . " Dekhne Ki Tabeer",
            'name' => "Khwab mein " . ($symbol->title_urdu ?? $symbol->symbol_urdu ?? '') . " Dekhne Ki Tabeer",
            'description' => $symbol->interpretation_urdu ?? $symbol->interpretation ?? $symbol->short_interpretation ?? '',
            'inLanguage' => ['ur', 'en'],
            'author' => ['@type' => 'Organization', 'name' => 'NoorIslam'],
            'publisher' => [
                '@type' => 'Organization',
                'name' => 'NoorIslam',
                'logo' => [
                    '@type' => 'ImageObject',
                    'url' => config('app.url') . '/favicon.svg',
                ],
            ],
        ];
    }

    /**
     * Generate Wazifa schema.
     */
    public static function wazifaSchema($wazifa): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'Article',
            'articleSection' => 'Islamic Wazaif',
            'headline' => $wazifa->title_en ?? $wazifa->title ?? '',
            'alternateName' => $wazifa->title_ur ?? $wazifa->title_urdu ?? '',
            'description' => $wazifa->purpose ?? $wazifa->description ?? '',
            'inLanguage' => ['ur', 'en', 'ar'],
            'author' => ['@type' => 'Organization', 'name' => 'NoorIslam'],
            'publisher' => [
                '@type' => 'Organization',
                'name' => 'NoorIslam',
                'logo' => [
                    '@type' => 'ImageObject',
                    'url' => config('app.url') . '/favicon.svg',
                ],
            ],
        ];
    }

    /**
     * Generate BreadcrumbList schema.
     */
    public static function breadcrumbSchema(array $items): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => collect($items)->map(function ($item, $index) {
                return [
                    '@type' => 'ListItem',
                    'position' => $index + 1,
                    'name' => $item['name'],
                    'item' => $item['url'],
                ];
            })->toArray(),
        ];
    }

    /**
     * Encode schema array to JSON-LD script tag.
     */
    public static function toJsonLd(array $schema): string
    {
        if (empty($schema)) {
            return '';
        }

        return '<script type="application/ld+json">' . "\n" 
            . json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) 
            . "\n" . '</script>';
    }
}
