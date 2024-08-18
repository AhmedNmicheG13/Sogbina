<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHeaderColorLargeToHomePageSettingsTable extends Migration
{
    public function up()
    {
        Schema::table('home_page_settings', function (Blueprint $table) {
            $table->string('header_color_large', 7)->nullable()->after('header_color_mobile');
        });
    }

    public function down()
    {
        Schema::table('home_page_settings', function (Blueprint $table) {
            $table->dropColumn('header_color_large');
        });
    }
}
