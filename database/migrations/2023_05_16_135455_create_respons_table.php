<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->integer('response_1')->nullable();
            $table->integer('response_2')->nullable();
            $table->integer('response_3')->nullable();
            $table->integer('response_4')->nullable();
            $table->integer('response_5')->nullable();
            $table->integer('response_6')->nullable();
            $table->integer('response_7')->nullable();
            $table->integer('response_8')->nullable();
            $table->integer('response_9')->nullable();
            $table->integer('response_10')->nullable();
            $table->integer('response_11')->nullable();
            $table->integer('response_12')->nullable();
            $table->integer('response_13')->nullable();
            $table->integer('response_14')->nullable();
            $table->integer('response_15')->nullable();
            $table->integer('response_16')->nullable();
            $table->integer('response_17')->nullable();
            $table->integer('response_18')->nullable();
            $table->string('stress_level')->nullable();
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
        Schema::dropIfExists('respons');
    }
}
