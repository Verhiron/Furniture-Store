<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->integer('item_id', true);
            $table->integer('item_type_id')->index('item_type_id');
            $table->integer('room_id')->index('room_id');
            $table->string('item_name');
            $table->string('item_info', 5000);
            $table->string('item_price');
            $table->string('item_img', 5000);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
