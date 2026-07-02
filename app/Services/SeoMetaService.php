<?php

namespace App\Services;

use Illuminate\Support\Facades\View;

class SeoMetaService
{
    public function setForPage(string $title, string $description, string $canonical, array $schema = [])
    {
        // We create a stdClass object so it matches the expected $seoMeta format in app.blade.php
        $seoMeta = new \stdClass();
        $seoMeta->title = $title;
        $seoMeta->meta_description = $description;
        $seoMeta->canonical_url = $canonical;
        
        if (!empty($schema)) {
            $seoMeta->schema_override_json = json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
        } else {
            $seoMeta->schema_override_json = null;
        }

        View::share('seoMeta', $seoMeta);
    }
    
    public function breadcrumb(array $items): string
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

        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => $list,
        ];
        
        return json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    }
    
    public function organizationSchema(): string
    {
        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => 'Noor-e-Islam',
            'url' => config('app.url', 'https://noorislam.com'),
            'logo' => asset('favicon.svg'),
            'description' => 'Complete Islamic guide for Pakistan — Prayer times, Quran, Duas, and more.',
            'sameAs' => ['https://facebook.com/noorislam', 'https://twitter.com/noorislam']
        ];
        return json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    }
    
    public function faqSchema(array $faqs): string
    {
        $entities = [];
        foreach ($faqs as $faq) {
            $entities[] = [
                '@type' => 'Question',
                'name' => $faq['q'],
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => $faq['a'],
                ],
            ];
        }

        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => $entities,
        ];
        return json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    }
    
    public function howToSchema(string $title, array $steps): string
    {
        $stepEntities = [];
        foreach ($steps as $step) {
            $stepEntities[] = [
                '@type' => 'HowToStep',
                'name' => $step['name'],
                'text' => $step['text'],
            ];
        }

        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'HowTo',
            'name' => $title,
            'step' => $stepEntities
        ];
        return json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    }
}
