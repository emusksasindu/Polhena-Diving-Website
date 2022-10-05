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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('serviceID',20);
            $table->foreignId('user_id')->constrained();
            $table->mediumText('shipping_address');
            $table->string('receiver_name',50);
            $table->string('number',15);
            $table->string('country',20);
            $table->string('email',50);
            $table->double('sub_total',10,2);
            $table->double('discount');
            $table->double('total',10,2);
            $table->string('status',10);
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
        Schema::dropIfExists('orders');
    }
};
