<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->enum('sexo', ['M', 'F']);
            $table->date('nascimento');
            $table->string('cpf', 11)->unique();
            $table->unsignedBigInteger('veiculo_id')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->foreign('veiculo_id')
                ->references('id')
                ->on('vehicles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drivers');
    }
}
