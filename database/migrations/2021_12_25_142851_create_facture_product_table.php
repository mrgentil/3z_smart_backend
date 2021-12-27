<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFactureProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facture_product', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->float('price_unit');
            $table->integer('user_id')->index()->unsigned()->nullable();
            $table->integer('server_id')->index()->unsigned()->nullable();
            $table->integer('product_id')->index()->unsigned()->nullable();
            $table->integer('facture_id')->index()->unsigned()->nullable();
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
        Schema::dropIfExists('commande_product');
    }
}
