<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPageTitleAndAboutTextToHomePageSettings extends Migration
{
    public function up()
    {
        Schema::table('home_page_settings', function (Blueprint $table) {
            $table->string('page_title')->nullable()->after('seo_slug');
            $table->text('about_text')->nullable()->after('page_title');
        });
    }

    public function down()
    {
        Schema::table('home_page_settings', function (Blueprint $table) {
            $table->dropColumn('page_title');
            $table->dropColumn('about_text');
        });
    }
}
