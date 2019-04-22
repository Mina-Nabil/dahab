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
            $table->bigIncrements('id');
            $table->date('ORDR_DATE');
            $table->string('ORDR_CLNT', 255);
            $table->string('ORDR_SRNO')->nullable();
            $table->double('ORDR_TOTL_RED')->default(0);
            $table->double('ORDR_TOTL_WHTE')->default(0);
            $table->double('ORDR_TOTL_YELW')->default(0);
            $table->string('ORDR_CMNT')->nullable();
            $table->timestamps();
        });

        Schema::create('order_items', function (Blueprint $table){
          $table->bigIncrements('id');
          $table->unsignedBigInteger('ORIT_ORDR_ID');
          $table->unsignedBigInteger('ORIT_MODL_ID');
          $table->unsignedInteger('ORIT_CONT')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
        Schema::dropIfExists('orders');
    }
}
