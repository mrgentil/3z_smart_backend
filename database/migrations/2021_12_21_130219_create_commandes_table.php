<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('server_name');
            $table->float('amount');
            $table->integer('table_id')->index()->unsigned();
            $table->integer('user_id')->index()->unsigned();
            $table->integer('facture_id')->index()->unsigned();

            // $table->enum('state', ['En Cours', 'Payé', 'A Régulariser'])->default('En Cours');
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
        Schema::dropIfExists('commandes');
    }
}
