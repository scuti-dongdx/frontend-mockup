<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');

            $table->string('sales_office');
            $table->string('store_name');
            $table->string('prefecture');
            $table->string('address');
            $table->string('telephone_number');
            $table->string('number_of_equipment');

            $table->integer('user_id')->unsigned();
            $table->integer('price');
            $table->text('description');
            $table->boolean('active_row')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
