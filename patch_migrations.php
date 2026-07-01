<?php

$schemas = [
    'countries' => "\$table->string('name');\n            \$table->string('slug')->unique();\n            \$table->string('flag_code')->nullable();\n            \$table->string('moon_sighting_authority')->nullable();\n            \$table->string('default_timezone')->nullable();",
    'cities' => "\$table->foreignId('country_id')->constrained()->cascadeOnDelete();\n            \$table->string('name');\n            \$table->string('slug')->unique();\n            \$table->decimal('latitude', 10, 8)->nullable();\n            \$table->decimal('longitude', 11, 8)->nullable();\n            \$table->string('timezone')->nullable();\n            \$table->string('prayer_calc_method')->nullable();\n            \$table->text('local_context_note')->nullable();",
    'hijri_date_caches' => "\$table->date('gregorian_date')->unique();\n            \$table->integer('hijri_day');\n            \$table->string('hijri_month');\n            \$table->integer('hijri_year');\n            \$table->string('source')->nullable();\n            \$table->timestamp('fetched_at')->nullable();",
    'prayer_times' => "\$table->foreignId('city_id')->constrained()->cascadeOnDelete();\n            \$table->date('date');\n            \$table->string('fajr');\n            \$table->string('sunrise');\n            \$table->string('dhuhr');\n            \$table->string('asr');\n            \$table->string('maghrib');\n            \$table->string('isha');\n            \$table->string('calc_method')->nullable();\n            \$table->timestamp('fetched_at')->nullable();\n            \$table->unique(['city_id', 'date']);",
    'ramadan_timings' => "\$table->foreignId('city_id')->constrained()->cascadeOnDelete();\n            \$table->integer('ramadan_year');\n            \$table->date('date');\n            \$table->string('sehri_time');\n            \$table->string('iftar_time');\n            \$table->unique(['city_id', 'date']);",
    'hijri_months' => "\$table->integer('month_number')->unique();\n            \$table->string('name_ar');\n            \$table->string('name_ur');\n            \$table->string('name_en');\n            \$table->string('slug')->unique();\n            \$table->longText('significance_content')->nullable();",
    'islamic_events' => "\$table->string('name');\n            \$table->foreignId('hijri_month_id')->constrained()->cascadeOnDelete();\n            \$table->integer('hijri_day');\n            \$table->text('description')->nullable();\n            \$table->string('event_type')->nullable();",
    'surahs' => "\$table->integer('number')->unique();\n            \$table->string('name_ar');\n            \$table->string('name_ur');\n            \$table->string('name_en');\n            \$table->string('slug')->unique();\n            \$table->integer('ayah_count');\n            \$table->string('para_juz')->nullable();\n            \$table->string('revelation_place')->nullable();\n            \$table->longText('arabic_text')->nullable();\n            \$table->longText('urdu_translation')->nullable();\n            \$table->longText('english_translation')->nullable();\n            \$table->string('audio_url')->nullable();\n            \$table->string('pdf_url')->nullable();",
    'surah_ayahs' => "\$table->foreignId('surah_id')->constrained()->cascadeOnDelete();\n            \$table->integer('ayah_number');\n            \$table->longText('arabic_text')->nullable();\n            \$table->longText('urdu_translation')->nullable();\n            \$table->longText('english_translation')->nullable();\n            \$table->unique(['surah_id', 'ayah_number']);",
    'fazilat_entries' => "\$table->foreignId('surah_id')->constrained()->cascadeOnDelete();\n            \$table->string('question');\n            \$table->text('answer');\n            \$table->string('hadith_reference')->nullable();\n            \$table->enum('verification_status', ['verified', 'commonly_cited'])->default('commonly_cited');",
    'hadith_topics' => "\$table->string('topic_name');\n            \$table->string('slug')->unique();\n            \$table->longText('content');\n            \$table->string('hadith_book')->nullable();\n            \$table->string('hadith_number')->nullable();",
    'authors' => "\$table->string('name');\n            \$table->string('credential')->nullable();\n            \$table->text('bio')->nullable();\n            \$table->string('photo_path')->nullable();",
    'scholars' => "\$table->string('name');\n            \$table->string('institution')->nullable();\n            \$table->string('credential')->nullable();\n            \$table->string('photo_path')->nullable();",
    'content_reviews' => "\$table->morphs('reviewable');\n            \$table->foreignId('author_id')->nullable()->constrained()->nullOnDelete();\n            \$table->foreignId('scholar_id')->nullable()->constrained()->nullOnDelete();\n            \$table->timestamp('reviewed_at')->nullable();",
    'comments' => "\$table->morphs('commentable');\n            \$table->string('name');\n            \$table->string('city')->nullable();\n            \$table->text('body');\n            \$table->enum('status', ['pending', 'approved', 'spam'])->default('pending');\n            \$table->string('ip_address')->nullable();",
    'seo_metas' => "\$table->morphs('metaable');\n            \$table->string('title')->unique()->nullable();\n            \$table->string('meta_description', 160)->nullable();\n            \$table->string('canonical_url')->nullable();\n            \$table->string('og_image')->nullable();\n            \$table->json('schema_override_json')->nullable();",
    'subscribers' => "\$table->string('email')->unique();\n            \$table->string('status')->default('active');\n            \$table->timestamp('subscribed_at')->nullable();",
    'contact_messages' => "\$table->string('first_name');\n            \$table->string('last_name');\n            \$table->string('email');\n            \$table->string('phone')->nullable();\n            \$table->string('subject');\n            \$table->text('message');\n            \$table->string('status')->default('new');",
    'site_settings' => "\$table->string('key')->unique();\n            \$table->text('value')->nullable();",
];

$dir = 'database/migrations';
$files = glob($dir . '/*.php');

foreach ($files as $file) {
    $content = file_get_contents($file);
    foreach ($schemas as $table => $schemaFields) {
        if (strpos($file, 'create_' . $table . '_table') !== false) {
            $replacement = "\$table->id();\n            " . $schemaFields . "\n            \$table->timestamps();";
            
            // Replace the standard content between blueprint function
            $content = preg_replace('/\$table->id\(\);\s*\$table->timestamps\(\);/s', $replacement, $content);
            file_put_contents($file, $content);
            echo "Updated $file\n";
        }
    }
}
