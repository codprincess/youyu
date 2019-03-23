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
            $table->string('openid', 32)->comment('微信openid');
            $table->string('nickname', 32)->comment('微信昵称');
            $table->integer('sex', 32)->comment('用户的性别，值为1时是男性，值为2时是女性，值为0时是未知');
            $table->string('province', 32)->comment('省份');
            $table->string('city', 32)->comment('城市');
            $table->string('country', 32)->comment('国家');
            $table->string('avatar', 32)->comment('头像');
            $table->string('privilege', 32)->comment('用户特权信息，json 数组，如微信沃卡用户为（chinaunicom）');
            $table->string('unionid', 32)->comment('用户unionid');
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
