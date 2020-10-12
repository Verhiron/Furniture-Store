<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->foreign('item_type_id', 'items_ibfk_1')->references('item_type_id')->on('item_type')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('room_id', 'items_ibfk_2')->references('room_id')->on('rooms')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->dropForeign('items_ibfk_1');
            $table->dropForeign('items_ibfk_2');
        });
    }
}
