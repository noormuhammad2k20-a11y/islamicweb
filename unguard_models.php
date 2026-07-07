<?php

$models = ['SurahContentBlock', 'SurahFaq', 'SurahTheme', 'SurahImportantAyah', 'SurahRelatedSurah', 'SurahEntity', 'SurahCollection', 'SurahRecitationGuide', 'SurahLearningPath'];

foreach ($models as $model) {
    $file = __DIR__ . '/app/Models/' . $model . '.php';
    if (file_exists($file)) {
        $content = file_get_contents($file);
        if (strpos($content, 'protected $guarded') === false) {
            $content = str_replace('use HasFactory;', "use HasFactory;\n    protected \$guarded = [];", $content);
            file_put_contents($file, $content);
            echo "Updated $model.php\n";
        }
    }
}
