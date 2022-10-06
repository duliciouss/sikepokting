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
        Schema::table('commodities', function (Blueprint $table) {
            $table->uuid('parent_id')->nullable()->after('type');
            $table->foreign('parent_id')->references('id')->on('commodities')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('commodities', function (Blueprint $table) {
            $table->dropForeign('commodities_parent_id_foreign');
            $table->dropIndex('commodities_parent_id_foreign');
            $table->dropColumn('parent_id');
        });
    }
};
