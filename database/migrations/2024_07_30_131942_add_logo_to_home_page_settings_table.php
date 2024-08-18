<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLogoToHomePageSettingsTable extends Migration
{
    public function up()
    {
        Schema::table('home_page_settings', function (Blueprint $table) {
            $table->string('logo')->nullable()->after('favicon');
        });
    }

    public function down()
    {
        Schema::table('home_page_settings', function (Blueprint $table) {
            $table->dropColumn('logo');
        });
    }
}
