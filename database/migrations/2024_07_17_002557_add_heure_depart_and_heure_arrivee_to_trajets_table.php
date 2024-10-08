<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHeureDepartAndHeureArriveeToTrajetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trajets', function (Blueprint $table) {
            $table->string('heure_depart')->nullable();
            $table->string('heure_arrivee')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trajets', function (Blueprint $table) {
            $table->dropColumn('heure_depart');
            $table->dropColumn('heure_arrivee');
        });
    }
}
