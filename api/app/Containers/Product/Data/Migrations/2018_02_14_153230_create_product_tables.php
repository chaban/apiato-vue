<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {

            $table->increments('id');
            $table->unsignedInteger('category_id');
            $table->string('name');
            $table->text('desc');
            $table->unsignedInteger('price');
            $table->jsonb('attr')->default(json_encode([]));

            $table->timestamps();
            //$table->softDeletes();
            //indexes and foreign keys

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('products');
    }
}
