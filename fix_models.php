<?php

$models = [
    'SurahContentBlock', 'SurahFaq', 'SurahTheme', 'SurahEntity', 
    'SurahCollection', 'SurahRecitationGuide', 'SurahLearningPath'
];

foreach ($models as $model) {
    $path = "d:\\Xamp\\htdocs\\Islamicwebsite\\app\\Models\\$model.php";
    if (file_exists($path)) {
        $content = file_get_contents($path);
        if (strpos($content, 'protected $guarded = [];') === false) {
            $replacement = <<<PHP
    protected \$guarded = [];

    public function surah()
    {
        return \$this->belongsTo(Surah::class);
    }
}
PHP;
            if ($model === 'SurahCollection') {
                $replacement = <<<PHP
    protected \$guarded = [];

    public function surahs()
    {
        return \$this->belongsToMany(Surah::class, 'surah_collection_items', 'collection_id', 'surah_id');
    }
}
PHP;
            } elseif ($model === 'SurahEntity') {
                $replacement = <<<PHP
    protected \$guarded = [];

    public function surahs()
    {
        return \$this->belongsToMany(Surah::class, 'surah_entity_map', 'entity_id', 'surah_id');
    }
}
PHP;
            }

            $content = str_replace("    //\n}", $replacement, $content);
            file_put_contents($path, $content);
            echo "Updated $model\n";
        }
    }
}
