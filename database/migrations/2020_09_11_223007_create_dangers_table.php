<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDangersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dangers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->tinyInteger('rating'); # number of "stars"
            $table->string('name', 100); # danger name, max 100 characters
            $table->string('creator', 50); # creator name (for credit purposes), max 50 characters
            $table->string('description', 400)->nullable(true); # optional description/exposition of the Danger
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dangers');
    }
}
