<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('price_details', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('price_id');
            $table->uuid('commodity_id');
            $table->string('price');
            $table->string('uom');
            $table->dateTime('date');
            $table->uuid('created_by');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('price_details');
    }
};
