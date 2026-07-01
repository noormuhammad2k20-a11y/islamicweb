<?php

namespace App\Traits;

use App\Models\SeoMeta;

trait SeoMetaTrait
{
    public function seoMeta()
    {
        return $this->morphOne(SeoMeta::class, 'metaable');
    }

    public function getSeoTitleAttribute()
    {
        return $this->seoMeta->title ?? $this->generateDefaultSeoTitle();
    }

    public function getSeoDescriptionAttribute()
    {
        return $this->seoMeta->meta_description ?? $this->generateDefaultSeoDescription();
    }

    protected function generateDefaultSeoTitle()
    {
        return $this->name ?? $this->title ?? config('app.name');
    }

    protected function generateDefaultSeoDescription()
    {
        return 'Discover authentic Islamic knowledge, prayer times, and more on ' . config('app.name');
    }
}
