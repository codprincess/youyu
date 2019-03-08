<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('venue_id')->comment('场馆id');
            $table->integer('user_id')->unsigned()->default(0)->index()->comment('用户id');
            $table->string('order_no')->unique()->comment('订单流水号');
            $table->bigInteger('total_amount')->comment('订单总金额');
            $table->tinyInteger('status')->default(1)->comment('订单状态，1待付款，2已支付，3已取消');
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
}
