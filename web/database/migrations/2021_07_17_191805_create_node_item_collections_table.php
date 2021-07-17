<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNodeItemCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('node_item_collections', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('collection_node_item', function(Blueprint $table) {
            $table->unsignedBigInteger('node_item_collection_id');
            $table->unsignedBigInteger('node_item_id');
            $table->unique(['node_item_collection_id', 'node_item_id']);

            $table->foreign('node_item_collection_id')
                ->references('id')
                ->on('node_item_collections')
                ->onDelete('cascade');
            $table->foreign('node_item_id')
                ->references('id')
                ->on('node_items')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('node_item_collections');
        Schema::dropIfExists('node_item_collection_node_item');
    }
}
