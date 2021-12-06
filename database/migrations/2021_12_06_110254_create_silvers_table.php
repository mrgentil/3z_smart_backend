<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSilversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('silvers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 191);
            $table->string('firstName', 191);
            $table->string('lastName', 191);
            $table->string('adress', 191);
            $table->string('phone', 191);
            $table->string('genre', 191);
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('permission_id')->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('silvers');
    }
}
