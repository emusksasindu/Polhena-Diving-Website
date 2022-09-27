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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->mediumText('description')->nullable();
            $table->mediumInteger('qty');
            $table->string('size',8);
            $table->string('imageUrl_1');
            $table->string('imageUrl_2');
            $table->string('imageUrl_3');
            $table->string('colors');
            $table->string('status',10);
            $table->double('discount',2,2);
            $table->double('selling_price',10,2);
            $table->double('cost',10,2);
            $table->foreignId('categories_id');
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
};
