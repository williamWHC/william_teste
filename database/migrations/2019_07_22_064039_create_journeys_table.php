<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJourneysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journeys', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('valor',9,2);
            $table->unsignedBigInteger('motorista_id')->nullable();
            $table->unsignedBigInteger('passageiro_id')->nullable();
            $table->timestamps();
            $table->foreign('motorista_id')
                ->references('id')
                ->on('drivers');
            $table->foreign('passageiro_id')
                ->references('id')
                ->on('passengers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('journeys');
    }
}
