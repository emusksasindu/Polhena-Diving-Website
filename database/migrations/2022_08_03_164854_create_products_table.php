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
            $table->string('productID',20);
            $table->string('name',50);
            $table->mediumText('description')->nullable();
            $table->mediumInteger('small_qty');
            $table->mediumInteger('medium_qty');
            $table->mediumInteger('large_qty');
            $table->mediumInteger('xl_qty');
            $table->mediumInteger('xxl_qty');
            $table->string('image_1');
            $table->string('image_2');
            $table->string('image_3');
            $table->string('status',10);
            $table->double('discount',2,2);
            $table->double('selling_price',10,2);
            $table->double('cost',10,2);
            $table->foreignId('category_id')->constrained();
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
