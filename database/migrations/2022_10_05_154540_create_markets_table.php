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
        Schema::create('markets', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('unor_id');
            $table->string('name');
            $table->string('address');
            $table->integer('is_active')->comment('1: active; 2: nonactive');
            $table->timestamps();

            $table->foreign('unor_id')->references('id')->on('unors')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('markets');
    }
};
