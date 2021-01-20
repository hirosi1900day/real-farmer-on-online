<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminChatmessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_chatmessages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('admin_user_id');
            $table->unsignedBigInteger('admin_chatroom_id');
            $table->string('messages');
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('admin_chatroom_id')->references('id')->on('admin_chatrooms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_chatmessages');
    }
}
