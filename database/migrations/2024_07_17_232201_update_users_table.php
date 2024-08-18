<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
           
            // إضافة الأعمدة الجديدة
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('postal_code')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // إعادة الأعمدة 'first_name' و 'last_name'
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();

            // حذف الأعمدة الجديدة
            $table->dropColumn('country');
            $table->dropColumn('city');
            $table->dropColumn('postal_code');
        });
    }
}

