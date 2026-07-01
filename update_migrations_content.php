<?php

$dir = __DIR__ . '/database/migrations';
$files = scandir($dir);

$replacements = [
    'create_namaz_guides_table' => function($content) {
        return str_replace(
            '$table->id();',
            '$table->id();' . "\n" . '            $table->string(\'title\');' . "\n" . '            $table->string(\'type\')->nullable(); // fard, sunnah, etc.' . "\n" . '            $table->text(\'description\')->nullable();' . "\n" . '            $table->string(\'icon\')->nullable();',
            $content
        );
    },
    'create_namaz_steps_table' => function($content) {
        return str_replace(
            '$table->id();',
            '$table->id();' . "\n" . '            $table->foreignId(\'namaz_guide_id\')->constrained()->onDelete(\'cascade\');' . "\n" . '            $table->integer(\'step_number\');' . "\n" . '            $table->string(\'title\');' . "\n" . '            $table->text(\'instruction\');' . "\n" . '            $table->text(\'arabic\')->nullable();' . "\n" . '            $table->text(\'transliteration\')->nullable();' . "\n" . '            $table->text(\'translation\')->nullable();' . "\n" . '            $table->string(\'image_url\')->nullable();',
            $content
        );
    },
    'create_hajj_guides_table' => function($content) {
        return str_replace(
            '$table->id();',
            '$table->id();' . "\n" . '            $table->string(\'title\');' . "\n" . '            $table->string(\'type\'); // hajj, umrah' . "\n" . '            $table->text(\'overview\')->nullable();',
            $content
        );
    },
    'create_hajj_steps_table' => function($content) {
        return str_replace(
            '$table->id();',
            '$table->id();' . "\n" . '            $table->foreignId(\'hajj_guide_id\')->constrained()->onDelete(\'cascade\');' . "\n" . '            $table->integer(\'day_number\')->nullable();' . "\n" . '            $table->integer(\'step_number\');' . "\n" . '            $table->string(\'title\');' . "\n" . '            $table->text(\'content\');' . "\n" . '            $table->string(\'location\')->nullable();',
            $content
        );
    },
    'create_knowledge_categories_table' => function($content) {
        return str_replace(
            '$table->id();',
            '$table->id();' . "\n" . '            $table->string(\'name\');' . "\n" . '            $table->string(\'slug\')->unique();' . "\n" . '            $table->text(\'description\')->nullable();' . "\n" . '            $table->string(\'icon\')->nullable();',
            $content
        );
    },
    'create_knowledge_articles_table' => function($content) {
        return str_replace(
            '$table->id();',
            '$table->id();' . "\n" . '            $table->foreignId(\'knowledge_category_id\')->constrained()->onDelete(\'cascade\');' . "\n" . '            $table->string(\'title\');' . "\n" . '            $table->string(\'slug\')->unique();' . "\n" . '            $table->longText(\'content\');' . "\n" . '            $table->string(\'author\')->nullable();' . "\n" . '            $table->integer(\'views\')->default(0);',
            $content
        );
    }
];

foreach ($files as $file) {
    if (strpos($file, '.php') !== false) {
        foreach ($replacements as $key => $callback) {
            if (strpos($file, $key) !== false) {
                $path = $dir . '/' . $file;
                $content = file_get_contents($path);
                $newContent = $callback($content);
                file_put_contents($path, $newContent);
                echo "Updated: $file\n";
            }
        }
    }
}
echo "Done.\n";
