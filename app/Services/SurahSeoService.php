<?php
namespace App\Services;

use App\Models\Surah;
use App\Models\SeoMeta;

class SurahSeoService
{
    public function getSurahSeoData(Surah $surah): array
    {
        $siteUrl = rtrim(config('app.url'), '/');
        $pageUrl = route('surah.show', $surah->slug);

        return [
            'title'          => $surah->effective_meta_title,
            'description'    => $surah->effective_meta_description,
            'canonical'      => $surah->canonical_url,
            'og_title'       => $surah->effective_meta_title,
            'og_description' => $surah->effective_meta_description,
            'og_image'       => $surah->seoMeta?->og_image
                                ?? $siteUrl . '/images/surahs/og-' . $surah->slug . '.jpg',
            'og_type'        => 'article',
            'twitter_card'   => 'summary_large_image',
            'robots'         => 'index, follow',
            'breadcrumbs'    => $this->buildBreadcrumbs($surah),
        ];
    }

    public function buildSchema(Surah $surah): array
    {
        // Return custom override if stored in DB
        if ($surah->seoMeta?->schema_override_json) {
            return json_decode($surah->seoMeta->schema_override_json, true);
        }

        $siteUrl = rtrim(config('app.url'), '/');
        $pageUrl = route('surah.show', $surah->slug);
        $siteName = config('app.name', 'NoorIslam');
        $schemas  = [];

        // 1. WebSite + SearchAction
        $schemas[] = [
            '@context'        => 'https://schema.org',
            '@type'           => 'WebSite',
            'name'            => $siteName,
            'url'             => $siteUrl,
            'potentialAction' => [
                '@type'       => 'SearchAction',
                'target'      => [
                    '@type'       => 'EntryPoint',
                    'urlTemplate' => $siteUrl . '/search?q={search_term_string}',
                ],
                'query-input' => 'required name=search_term_string',
            ],
        ];

        // 2. Organization
        $schemas[] = [
            '@context' => 'https://schema.org',
            '@type'    => 'Organization',
            'name'     => $siteName,
            'url'      => $siteUrl,
            'logo'     => $siteUrl . '/images/logo.png',
        ];

        // 3. BreadcrumbList
        $schemas[] = [
            '@context'        => 'https://schema.org',
            '@type'           => 'BreadcrumbList',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',
                 'item'  => $siteUrl],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Surahs',
                 'item'  => $siteUrl . '/surahs'],
                ['@type' => 'ListItem', 'position' => 3,
                 'name'  => 'Surah ' . $surah->name_en, 'item' => $pageUrl],
            ],
        ];

        // 4. Article
        $schemas[] = [
            '@context'    => 'https://schema.org',
            '@type'       => 'Article',
            '@id'         => $pageUrl . '#article',
            'headline'    => 'Surah ' . $surah->name_en . ' — Complete Arabic, Urdu & Tafsir Guide',
            'description' => $surah->effective_meta_description,
            'url'         => $pageUrl,
            'inLanguage'  => ['ar', 'ur', 'en'],
            'about'       => ['@type' => 'Book', 'name' => 'Quran', 'inLanguage' => 'ar'],
            'publisher'   => ['@type' => 'Organization', 'name' => $siteName, 'url' => $siteUrl],
            'dateModified' => $surah->updated_at?->toIso8601String(),
        ];

        // 5. FAQPage (only if FAQs exist)
        if ($surah->faqs && $surah->faqs->count() > 0) {
            $schemas[] = [
                '@context'   => 'https://schema.org',
                '@type'      => 'FAQPage',
                'mainEntity' => $surah->faqs->map(fn($faq) => [
                    '@type'          => 'Question',
                    'name'           => $faq->question_en,
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text'  => strip_tags($faq->answer_en),
                    ],
                ])->toArray(),
            ];
        }

        // 6. Book (Surah as chapter of Quran)
        $schemas[] = [
            '@context'     => 'https://schema.org',
            '@type'        => 'Book',
            'name'         => 'Surah ' . $surah->name_en,
            'alternateName' => [$surah->name_ar, $surah->name_ur],
            'inLanguage'   => 'ar',
            'numberOfPages' => max(1, $surah->page_end - $surah->page_start + 1),
            'isPartOf'     => ['@type' => 'Book', 'name' => 'The Holy Quran'],
        ];

        // 7. WebPage
        $schemas[] = [
            '@context'    => 'https://schema.org',
            '@type'       => 'WebPage',
            '@id'         => $pageUrl . '#webpage',
            'url'         => $pageUrl,
            'name'        => $surah->effective_meta_title,
            'description' => $surah->effective_meta_description,
            'isPartOf'    => ['@type' => 'WebSite', 'url' => $siteUrl],
        ];

        return $schemas;
    }

    public function getIndexSeoData(): array
    {
        $siteUrl  = rtrim(config('app.url'), '/');
        $siteName = config('app.name', 'NoorIslam');
        return [
            'title'       => "114 Surahs of Quran — Arabic, Urdu & English | {$siteName}",
            'description' => 'Complete list of all 114 Surahs of the Holy Quran with Arabic text, Urdu and English translation, Tafsir, audio recitation and PDF download.',
            'canonical'   => $siteUrl . '/surahs',
            'og_title'    => "All 114 Surahs — Complete Quran | {$siteName}",
            'og_description' => 'Read and listen to all 114 Surahs of the Quran online.',
            'og_image'    => $siteUrl . '/images/surahs/og-surahs-index.jpg',
            'og_type'     => 'website',
            'twitter_card' => 'summary_large_image',
            'robots'      => 'index, follow',
            'breadcrumbs' => [
                ['label' => 'Home',   'url' => route('home')],
                ['label' => 'Surahs', 'url' => null],
            ],
        ];
    }

    private function buildBreadcrumbs(Surah $surah): array
    {
        return [
            ['label' => 'Home',   'url' => route('home')],
            ['label' => 'Surahs', 'url' => route('surah.index')],
            ['label' => 'Surah ' . $surah->name_en, 'url' => null],
        ];
    }
}
