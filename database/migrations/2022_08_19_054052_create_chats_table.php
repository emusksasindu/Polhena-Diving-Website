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
        Schema::create('chats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guests_id');
            $table->unsignedBigInteger('user_sender_id');
            $table->unsignedBigInteger('user_receiver_id');
            $table->foreign('user_sender_id')->references('id')->on('users')->nullable();
            $table->foreign('user_receiver_id')->references('id')->on('users')->nullable();
            $table->string('sender_type');
            $table->string('receiver_type');
            $table->mediumText('message')->nullable();
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
        Schema::dropIfExists('chats');
    }
};
