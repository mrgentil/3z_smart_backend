<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandeTemposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commande_tempos', function (Blueprint $table) {
            $table->id();

            $table->integer('table_id')->index()->unsigned();
            $table->integer('user_id')->index()->unsigned();
            $table->integer('server_id')->index()->unsigned();
            $table->enum('state', ['En Cours', 'Payé', 'A Régulariser'])->default('En Cours');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commande_tempos');
    }
}
