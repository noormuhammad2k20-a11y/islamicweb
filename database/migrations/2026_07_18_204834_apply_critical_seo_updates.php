<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Add SEO fields to knowledge_articles
        Schema::table('knowledge_articles', function (Blueprint $table) {
            if (!Schema::hasColumn('knowledge_articles', 'meta_title')) {
                $table->string('meta_title', 255)->nullable()->after('title');
            }
            if (!Schema::hasColumn('knowledge_articles', 'meta_description')) {
                $table->text('meta_description')->nullable()->after('meta_title');
            }
            if (!Schema::hasColumn('knowledge_articles', 'og_image')) {
                $table->string('og_image', 255)->nullable();
            }
            if (!Schema::hasColumn('knowledge_articles', 'canonical_url')) {
                $table->string('canonical_url', 255)->nullable();
            }
            if (!Schema::hasColumn('knowledge_articles', 'focus_keyword')) {
                $table->string('focus_keyword', 150)->nullable();
            }
            if (!Schema::hasColumn('knowledge_articles', 'schema_type')) {
                $table->string('schema_type', 100)->default('Article');
            }
        });

        // 2. Add SEO fields to wazaif
        Schema::table('wazaif', function (Blueprint $table) {
            if (!Schema::hasColumn('wazaif', 'meta_title')) {
                $table->string('meta_title', 255)->nullable();
            }
            if (!Schema::hasColumn('wazaif', 'meta_description')) {
                $table->text('meta_description')->nullable();
            }
            if (!Schema::hasColumn('wazaif', 'og_image')) {
                $table->string('og_image', 255)->nullable();
            }
            if (!Schema::hasColumn('wazaif', 'focus_keyword')) {
                $table->string('focus_keyword', 150)->nullable();
            }
        });

        // 3. Add noindex control to dream_symbols
        Schema::table('dream_symbols', function (Blueprint $table) {
            if (!Schema::hasColumn('dream_symbols', 'seo_index')) {
                $table->boolean('seo_index')->default(1)->comment('0=noindex, 1=index');
            }
        });

        // 4. Mark thin dream symbols as noindex
        \Illuminate\Support\Facades\DB::statement('
            UPDATE dream_symbols 
            SET seo_index = 0 
            WHERE (detailed_interpretation_urdu IS NULL OR LENGTH(detailed_interpretation_urdu) < 500)
            AND (detailed_interpretation_english IS NULL OR LENGTH(detailed_interpretation_english) < 300)
        ');

        // 5. Add SEO fields to historical_events
        Schema::table('historical_events', function (Blueprint $table) {
            if (!Schema::hasColumn('historical_events', 'meta_title')) {
                $table->string('meta_title', 255)->nullable();
            }
            if (!Schema::hasColumn('historical_events', 'meta_description')) {
                $table->text('meta_description')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('knowledge_articles', function (Blueprint $table) {
            if (Schema::hasColumn('knowledge_articles', 'meta_title')) $table->dropColumn('meta_title');
            if (Schema::hasColumn('knowledge_articles', 'meta_description')) $table->dropColumn('meta_description');
            if (Schema::hasColumn('knowledge_articles', 'og_image')) $table->dropColumn('og_image');
            if (Schema::hasColumn('knowledge_articles', 'canonical_url')) $table->dropColumn('canonical_url');
            if (Schema::hasColumn('knowledge_articles', 'focus_keyword')) $table->dropColumn('focus_keyword');
            if (Schema::hasColumn('knowledge_articles', 'schema_type')) $table->dropColumn('schema_type');
        });

        Schema::table('wazaif', function (Blueprint $table) {
            if (Schema::hasColumn('wazaif', 'meta_title')) $table->dropColumn('meta_title');
            if (Schema::hasColumn('wazaif', 'meta_description')) $table->dropColumn('meta_description');
            if (Schema::hasColumn('wazaif', 'og_image')) $table->dropColumn('og_image');
            if (Schema::hasColumn('wazaif', 'focus_keyword')) $table->dropColumn('focus_keyword');
        });

        Schema::table('dream_symbols', function (Blueprint $table) {
            if (Schema::hasColumn('dream_symbols', 'seo_index')) $table->dropColumn('seo_index');
        });

        Schema::table('historical_events', function (Blueprint $table) {
            if (Schema::hasColumn('historical_events', 'meta_title')) $table->dropColumn('meta_title');
        });
    }
};
