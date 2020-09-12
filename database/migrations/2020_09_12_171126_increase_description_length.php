<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class IncreaseDescriptionLength extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dangers', function(Blueprint $dangers_table) {
            $dangers_table->string('description', 600)->change();
        });
        Schema::table('moves', function(Blueprint $moves_table) {
            $moves_table->string('description', 600)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dangers', function(Blueprint $dangers_table) {
            $dangers_table->string('description', 400)->change();
        });
        Schema::table('moves', function(Blueprint $moves_table) {
            $moves_table->string('description', 400)->change();
        });
    }
}
