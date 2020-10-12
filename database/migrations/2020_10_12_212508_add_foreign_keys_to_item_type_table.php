<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToItemTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('item_type', function (Blueprint $table) {
            $table->foreign('room_id', 'item_type_ibfk_1')->references('room_id')->on('rooms')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('item_type', function (Blueprint $table) {
            $table->dropForeign('item_type_ibfk_1');
        });
    }
}
