<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTextColorFieldsToHomePageSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('home_page_settings', function (Blueprint $table) {
            $table->string('header_text_color_large', 7)->nullable();
            $table->string('header_text_color_mobile', 7)->nullable();
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
            $table->dropColumn('header_text_color_large');
            $table->dropColumn('header_text_color_mobile');
        });
    }
}
