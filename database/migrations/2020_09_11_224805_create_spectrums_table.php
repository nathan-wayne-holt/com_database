<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpectrumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spectrums', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name', 50); # spectrum name, max 50 characters
            $table->tinyInteger('threshold'); # spectrum threshold (max)
            $table->foreignId('danger_id')->references('id')->on('dangers'); # link foreign key to dangers table
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spectrums');
    }
}
