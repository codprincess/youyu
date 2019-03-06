<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVenuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venues', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('场馆名称');
            $table->tinyInteger('status')->default(0)->comment('场馆状态');
            $table->string('description',2048)->comment('场馆详情');
            $table->string('thumb')->comment('场馆缩略图');
            $table->string('address')->comment('场馆地址');
            $table->bigInteger('price')->comment('单场价格');
            $table->string('counts')->comment('场馆总数量');
            $table->string('free_counts')->comment('空闲场地');
            $table->timestamp('start_time')->comment('场馆开放时间');
            $table->timestamp('end_time')->comment('场馆结束时间');
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
        Schema::dropIfExists('venues');
    }
}
