<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSeoFieldsToHomePageSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('home_page_settings', function (Blueprint $table) {
            if (!Schema::hasColumn('home_page_settings', 'seo_title')) {
                $table->string('seo_title')->nullable();
            }
            if (!Schema::hasColumn('home_page_settings', 'seo_description')) {
                $table->string('seo_description')->nullable();
            }
            if (!Schema::hasColumn('home_page_settings', 'seo_slug')) {
                $table->string('seo_slug')->nullable();
            }
            if (!Schema::hasColumn('home_page_settings', 'favicon')) {
                $table->string('favicon')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('home_page_settings', function (Blueprint $table) {
            if (Schema::hasColumn('home_page_settings', 'seo_title')) {
                $table->dropColumn('seo_title');
            }
            if (Schema::hasColumn('home_page_settings', 'seo_description')) {
                $table->dropColumn('seo_description');
            }
            if (Schema::hasColumn('home_page_settings', 'seo_slug')) {
                $table->dropColumn('seo_slug');
            }
            if (Schema::hasColumn('home_page_settings', 'favicon')) {
                $table->dropColumn('favicon');
            }
        });
    }
}
