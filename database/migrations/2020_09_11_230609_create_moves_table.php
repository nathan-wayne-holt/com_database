<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moves', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->enum('type', ['custom', 'soft', 'hard']); # move type
            $table->string('name', 100); # move name (only needed if a custom move)
            $table->string('description', 400); # move description, max 400 characters
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
        Schema::dropIfExists('moves');
    }
}
