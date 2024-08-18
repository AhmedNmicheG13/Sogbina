<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomePageSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('home_page_settings', function (Blueprint $table) {
            $table->id();
            $table->string('header_title')->nullable();
            $table->string('header_subtitle')->nullable();
            $table->string('header_color_mobile', 7)->nullable();
            $table->string('header_image_large')->nullable();
            $table->string('header_image_mobile')->nullable();
            $table->string('header_button_text')->nullable();
            $table->string('header_button_link')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('home_page_settings');
    }
}
