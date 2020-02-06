<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address_providers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('provider_id');
            $table->string('cep');
            $table->string('uf');
            $table->string('county');
            $table->string('neighborhood');
            $table->string('street');
            $table->integer('number');
            $table->string('complement')->nullable();
            $table->string('reference_point')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('provider_id')->references('id')->on('providers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('address_providers');
    }
}
