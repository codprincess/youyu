<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('openid',32)->comment('微信openid');
            $table->string('nickname',32)->comment('微信昵称');
            $table->string('openid',32)->comment('微信openid');
            $table->integer('sex',32)->comment('用户的性别，值为1时是男性，值为2时是女性，值为0时是未知');
            $table->string('province',32)->comment('用户的性别，值为1时是男性，值为2时是女性，值为0时是未知');
            $table->string('openid',32)->comment('微信openid');
            $table->integer('user_id')->unsigned()->default(0)->index()->comment('用户id');
            $table->string('order_no')->unique()->comment('订单流水号');
            $table->decimal('total_amount',10,2)->comment('订单总金额');
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
        Schema::dropIfExists('users');
    }
}
