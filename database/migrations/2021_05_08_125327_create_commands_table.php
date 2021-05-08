<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commands', function (Blueprint $table) {
            $table->id();
            $table->timestamps(); //TODO: to keep ?
            $table->float("totalAmount");
            $table->foreignId("user_id")->nullable()->default(null);
            $table->string("product"); //TODO: many-to-many ?
            $table->string("status"); //TODO: transform from string to enum
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commands');
    }
}
