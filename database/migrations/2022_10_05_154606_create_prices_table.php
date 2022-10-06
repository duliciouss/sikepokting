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
        Schema::create('prices', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('market_id');
            $table->uuid('commodity_id');
            $table->string('price');
            $table->string('uom');
            $table->datetime('date');
            $table->timestamps();

            $table->foreign('market_id')->references('id')->on('markets')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('commodity_id')->references('id')->on('commodities')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prices');
    }
};
