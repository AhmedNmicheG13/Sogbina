<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfileDetailsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('profile_picture')->nullable();
            $table->string('car_brand')->nullable();
            $table->string('car_serial')->nullable();
            $table->string('national_id')->nullable();
            $table->string('national_id_recto')->nullable();
            $table->string('national_id_verso')->nullable();
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
            $table->dropColumn(['profile_picture', 'car_brand', 'car_serial', 'national_id', 'national_id_recto', 'national_id_verso']);
        });
    }
}
