<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // ─── ALTER EXISTING TABLES ───────────────────────────────────────

        // 1. allah_names — add quran_reference, dhikr_count, dua_text, audio_url
        Schema::table('allah_names', function (Blueprint $table) {
            if (!Schema::hasColumn('allah_names', 'quran_reference')) {
                $table->string('quran_reference', 255)->nullable()->after('benefits');
            }
            if (!Schema::hasColumn('allah_names', 'dhikr_count')) {
                $table->integer('dhikr_count')->default(0)->after('quran_reference');
            }
            if (!Schema::hasColumn('allah_names', 'dua_text')) {
                $table->text('dua_text')->nullable()->after('dhikr_count');
            }
            if (!Schema::hasColumn('allah_names', 'audio_url')) {
                $table->string('audio_url', 255)->nullable()->after('dua_text');
            }
        });

        // 2. duas — add audio_url, dua_type, occasion, is_featured
        Schema::table('duas', function (Blueprint $table) {
            if (!Schema::hasColumn('duas', 'audio_url')) {
                $table->string('audio_url', 255)->nullable()->after('transliteration');
            }
            if (!Schema::hasColumn('duas', 'dua_type')) {
                $table->enum('dua_type', ['masnoon', 'quranic', 'general'])->default('masnoon')->after('audio_url');
            }
            if (!Schema::hasColumn('duas', 'occasion')) {
                $table->string('occasion', 255)->nullable()->after('dua_type');
            }
            if (!Schema::hasColumn('duas', 'is_featured')) {
                $table->tinyInteger('is_featured')->default(0)->after('occasion');
            }
        });

        // 3. islamic_names — add meaning_urdu, meaning_english, quranic refs, lucky attrs, etc.
        Schema::table('islamic_names', function (Blueprint $table) {
            if (!Schema::hasColumn('islamic_names', 'meaning_urdu')) {
                $table->string('meaning_urdu', 500)->nullable()->after('translation_urdu');
            }
            if (!Schema::hasColumn('islamic_names', 'meaning_english')) {
                $table->string('meaning_english', 500)->nullable()->after('meaning_urdu');
            }
            if (!Schema::hasColumn('islamic_names', 'quranic_reference')) {
                $table->string('quranic_reference', 255)->nullable()->after('meaning_english');
            }
            if (!Schema::hasColumn('islamic_names', 'is_quranic')) {
                $table->tinyInteger('is_quranic')->default(0)->after('quranic_reference');
            }
            if (!Schema::hasColumn('islamic_names', 'is_trending')) {
                $table->tinyInteger('is_trending')->default(0)->after('is_quranic');
            }
            if (!Schema::hasColumn('islamic_names', 'lucky_number')) {
                $table->integer('lucky_number')->nullable()->after('is_trending');
            }
            if (!Schema::hasColumn('islamic_names', 'lucky_color')) {
                $table->string('lucky_color', 100)->nullable()->after('lucky_number');
            }
            if (!Schema::hasColumn('islamic_names', 'lucky_stone')) {
                $table->string('lucky_stone', 100)->nullable()->after('lucky_color');
            }
            if (!Schema::hasColumn('islamic_names', 'personality_traits')) {
                $table->text('personality_traits')->nullable()->after('lucky_stone');
            }
            if (!Schema::hasColumn('islamic_names', 'similar_names')) {
                $table->json('similar_names')->nullable()->after('personality_traits');
            }
            if (!Schema::hasColumn('islamic_names', 'calligraphy_svg')) {
                $table->text('calligraphy_svg')->nullable()->after('similar_names');
            }
        });

        // 4. hadiths — add hadith_number, sahih_grade, is_featured
        Schema::table('hadiths', function (Blueprint $table) {
            if (!Schema::hasColumn('hadiths', 'hadith_number')) {
                $table->integer('hadith_number')->nullable()->after('chapter');
            }
            if (!Schema::hasColumn('hadiths', 'sahih_grade')) {
                $table->enum('sahih_grade', ['Sahih', 'Hasan', 'Daif', 'Maudu'])->default('Sahih')->after('hadith_number');
            }
            if (!Schema::hasColumn('hadiths', 'is_featured')) {
                $table->tinyInteger('is_featured')->default(0)->after('sahih_grade');
            }
        });

        // 5. cities — add population, province, meta_title, meta_description
        Schema::table('cities', function (Blueprint $table) {
            if (!Schema::hasColumn('cities', 'population')) {
                $table->integer('population')->nullable()->after('prayer_calc_method');
            }
            if (!Schema::hasColumn('cities', 'province')) {
                $table->string('province', 100)->nullable()->after('population');
            }
            if (!Schema::hasColumn('cities', 'meta_title')) {
                $table->string('meta_title', 255)->nullable()->after('province');
            }
            if (!Schema::hasColumn('cities', 'meta_description')) {
                $table->string('meta_description', 255)->nullable()->after('meta_title');
            }
        });

        // 6. scholars — add bio, social, specialty
        Schema::table('scholars', function (Blueprint $table) {
            if (!Schema::hasColumn('scholars', 'bio_urdu')) {
                $table->text('bio_urdu')->nullable();
            }
            if (!Schema::hasColumn('scholars', 'bio_english')) {
                $table->text('bio_english')->nullable();
            }
            if (!Schema::hasColumn('scholars', 'youtube_channel')) {
                $table->string('youtube_channel', 255)->nullable();
            }
            if (!Schema::hasColumn('scholars', 'website')) {
                $table->string('website', 255)->nullable();
            }
            if (!Schema::hasColumn('scholars', 'photo_url')) {
                $table->string('photo_url', 255)->nullable();
            }
            if (!Schema::hasColumn('scholars', 'specialty')) {
                $table->string('specialty', 255)->nullable();
            }
            if (!Schema::hasColumn('scholars', 'country')) {
                $table->string('country', 100)->nullable();
            }
        });

        // 7. surah_ayahs — add transliteration, audio_url, juz_number, page_number, sajdah
        Schema::table('surah_ayahs', function (Blueprint $table) {
            if (!Schema::hasColumn('surah_ayahs', 'transliteration')) {
                $table->text('transliteration')->nullable()->after('english_translation');
            }
            if (!Schema::hasColumn('surah_ayahs', 'audio_url')) {
                $table->string('audio_url', 255)->nullable()->after('transliteration');
            }
            if (!Schema::hasColumn('surah_ayahs', 'juz_number')) {
                $table->integer('juz_number')->nullable()->after('audio_url');
            }
            if (!Schema::hasColumn('surah_ayahs', 'page_number')) {
                $table->integer('page_number')->nullable()->after('juz_number');
            }
            if (!Schema::hasColumn('surah_ayahs', 'sajdah')) {
                $table->tinyInteger('sajdah')->default(0)->after('page_number');
            }
        });

        // ─── NEW TABLES ─────────────────────────────────────────────────

        // 1. Tafseer per ayah
        if (!Schema::hasTable('tafseer')) {
            Schema::create('tafseer', function (Blueprint $table) {
                $table->id();
                $table->foreignId('surah_id')->constrained()->cascadeOnDelete();
                $table->integer('ayah_number');
                $table->longText('tafseer_text');
                $table->string('scholar_name', 255)->default('Ibn Kathir');
                $table->enum('language', ['urdu', 'english'])->default('urdu');
                $table->string('slug', 255)->nullable();
                $table->timestamps();
                $table->index(['surah_id', 'ayah_number']);
            });
        }

        // 2. Quran bookmarks (session-based, no login)
        if (!Schema::hasTable('quran_bookmarks')) {
            Schema::create('quran_bookmarks', function (Blueprint $table) {
                $table->id();
                $table->string('session_id', 255);
                $table->integer('surah_id');
                $table->integer('ayah_number');
                $table->timestamps();
                $table->index('session_id');
            });
        }

        // 3. Wazaif collection
        if (!Schema::hasTable('wazaif')) {
            Schema::create('wazaif', function (Blueprint $table) {
                $table->id();
                $table->string('title_urdu', 255);
                $table->string('title_english', 255)->nullable();
                $table->text('arabic_text')->nullable();
                $table->text('urdu_text')->nullable();
                $table->string('purpose', 255)->nullable();
                $table->text('reference')->nullable();
                $table->text('method')->nullable();
                $table->string('slug', 255)->unique();
                $table->tinyInteger('is_authentic')->default(1);
                $table->tinyInteger('scholar_verified')->default(0);
                $table->timestamps();
                $table->index('purpose');
            });
        }

        // 4. Dream interpretation symbols
        if (!Schema::hasTable('dream_symbols')) {
            Schema::create('dream_symbols', function (Blueprint $table) {
                $table->id();
                $table->string('symbol_urdu', 255);
                $table->string('symbol_english', 255)->nullable();
                $table->text('interpretation_urdu');
                $table->text('interpretation_english')->nullable();
                $table->string('scholar_reference', 255)->nullable();
                $table->tinyInteger('is_good_dream')->nullable();
                $table->string('slug', 255)->unique();
                $table->integer('search_count')->default(0);
                $table->timestamps();
            });
        }

        // 5. Islamic Quiz questions
        if (!Schema::hasTable('islamic_quizzes')) {
            Schema::create('islamic_quizzes', function (Blueprint $table) {
                $table->id();
                $table->text('question_urdu');
                $table->text('question_english')->nullable();
                $table->string('option_a', 255);
                $table->string('option_b', 255);
                $table->string('option_c', 255);
                $table->string('option_d', 255);
                $table->enum('correct_option', ['a', 'b', 'c', 'd']);
                $table->text('explanation')->nullable();
                $table->string('category', 100)->nullable();
                $table->enum('difficulty', ['easy', 'medium', 'hard'])->default('easy');
                $table->timestamps();
                $table->index('category');
            });
        }

        // 6. Page views analytics
        if (!Schema::hasTable('page_views')) {
            Schema::create('page_views', function (Blueprint $table) {
                $table->id();
                $table->string('page_url', 500);
                $table->string('page_type', 100)->nullable();
                $table->integer('views')->default(0);
                $table->date('date');
                $table->unique(['page_url', 'date'], 'unique_page_date');
            });
        }

        // 7. Quran recitations (audio by reciters)
        if (!Schema::hasTable('quran_recitations')) {
            Schema::create('quran_recitations', function (Blueprint $table) {
                $table->id();
                $table->string('reciter_name', 255);
                $table->string('reciter_slug', 255);
                $table->integer('surah_id');
                $table->string('audio_url', 500);
                $table->integer('bitrate')->default(128);
                $table->timestamps();
                $table->index(['reciter_slug', 'surah_id']);
            });
        }

        // 8. Ramadan timings per city per year (if not already created by existing migration)
        // Note: ramadan_timings table already exists, so this creates a supplementary section table
        if (!Schema::hasTable('ramadan_sections')) {
            Schema::create('ramadan_sections', function (Blueprint $table) {
                $table->id();
                $table->integer('year');
                $table->foreignId('city_id')->nullable()->constrained()->nullOnDelete();
                $table->time('sehri_time')->nullable();
                $table->time('iftar_time')->nullable();
                $table->date('date')->nullable();
                $table->timestamps();
                $table->index(['year', 'city_id', 'date']);
            });
        }
    }

    public function down(): void
    {
        // Drop new tables
        Schema::dropIfExists('ramadan_sections');
        Schema::dropIfExists('quran_recitations');
        Schema::dropIfExists('page_views');
        Schema::dropIfExists('islamic_quizzes');
        Schema::dropIfExists('dream_symbols');
        Schema::dropIfExists('wazaif');
        Schema::dropIfExists('quran_bookmarks');
        Schema::dropIfExists('tafseer');

        // Reverse ALTER TABLE changes
        Schema::table('surah_ayahs', function (Blueprint $table) {
            $cols = ['transliteration', 'audio_url', 'juz_number', 'page_number', 'sajdah'];
            foreach ($cols as $col) {
                if (Schema::hasColumn('surah_ayahs', $col)) $table->dropColumn($col);
            }
        });
        Schema::table('scholars', function (Blueprint $table) {
            $cols = ['bio_urdu', 'bio_english', 'youtube_channel', 'website', 'photo_url', 'specialty', 'country'];
            foreach ($cols as $col) {
                if (Schema::hasColumn('scholars', $col)) $table->dropColumn($col);
            }
        });
        Schema::table('cities', function (Blueprint $table) {
            $cols = ['population', 'province', 'meta_title', 'meta_description'];
            foreach ($cols as $col) {
                if (Schema::hasColumn('cities', $col)) $table->dropColumn($col);
            }
        });
        Schema::table('hadiths', function (Blueprint $table) {
            $cols = ['hadith_number', 'sahih_grade', 'is_featured'];
            foreach ($cols as $col) {
                if (Schema::hasColumn('hadiths', $col)) $table->dropColumn($col);
            }
        });
        Schema::table('islamic_names', function (Blueprint $table) {
            $cols = ['meaning_urdu', 'meaning_english', 'quranic_reference', 'is_quranic', 'is_trending', 'lucky_number', 'lucky_color', 'lucky_stone', 'personality_traits', 'similar_names', 'calligraphy_svg'];
            foreach ($cols as $col) {
                if (Schema::hasColumn('islamic_names', $col)) $table->dropColumn($col);
            }
        });
        Schema::table('duas', function (Blueprint $table) {
            $cols = ['audio_url', 'dua_type', 'occasion', 'is_featured'];
            foreach ($cols as $col) {
                if (Schema::hasColumn('duas', $col)) $table->dropColumn($col);
            }
        });
        Schema::table('allah_names', function (Blueprint $table) {
            $cols = ['quran_reference', 'dhikr_count', 'dua_text', 'audio_url'];
            foreach ($cols as $col) {
                if (Schema::hasColumn('allah_names', $col)) $table->dropColumn($col);
            }
        });
    }
};
