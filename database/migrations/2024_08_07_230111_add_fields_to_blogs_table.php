<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToBlogsTable extends Migration
{
    public function up()
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->text('short_content')->nullable();
            $table->string('image')->nullable();
            $table->boolean('show_comments')->default(true);
            $table->string('category')->nullable();
            $table->string('seo_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('tags')->nullable();
        });
    }

    public function down()
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn(['short_content', 'image', 'show_comments', 'category', 'seo_title', 'meta_description', 'tags']);
        });
    }
}
