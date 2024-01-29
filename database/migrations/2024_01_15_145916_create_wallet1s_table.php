<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallet1s', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('name_id',100)->nullable(false);
            $table->foreign('name_id')->references('id')->on('Customer1s');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wallet1s');
    }
};
