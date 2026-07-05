<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DuaSeoMetaSeeder extends Seeder
{
    public function run(): void
    {
        $duas = \App\Models\Dua::all();
        foreach ($duas as $dua) {
            \App\Models\SeoMeta::updateOrCreate(
                ['metaable_type' => \App\Models\Dua::class, 'metaable_id' => $dua->id],
                [
                    'title' => Str::limit($dua->seo_title ?? ($dua->title_roman_urdu . ' - ' . $dua->title_urdu), 150) . ' | ' . $dua->id,
                    'meta_description' => $dua->meta_description ?? Str::limit($dua->short_meaning, 155),
                    'canonical_url' => config('app.url') . '/dua/' . $dua->seo_slug,
                    'og_image' => config('app.url') . '/images/duas/og-' . $dua->seo_slug . '.jpg',
                ]
            );
        }
        
        $cats = \App\Models\DuaCategory::all();
        foreach ($cats as $cat) {
            \App\Models\SeoMeta::updateOrCreate(
                ['metaable_type' => \App\Models\DuaCategory::class, 'metaable_id' => $cat->id],
                [
                    'title' => Str::limit($cat->seo_title ?? (($cat->name_roman_urdu ?? $cat->name_english ?? $cat->slug) . ' Ki Tamam Duain'), 150) . ' | ' . $cat->id,
                    'meta_description' => $cat->seo_description ?? ('NoorIslam par ' . ($cat->name_roman_urdu ?? $cat->name_english ?? $cat->slug) . ' ki duain mukammal Arabic, Urdu aur Roman Urdu mein parhen.'),
                    'canonical_url' => config('app.url') . '/duas/category/' . $cat->slug,
                ]
            );
        }
    }
}
