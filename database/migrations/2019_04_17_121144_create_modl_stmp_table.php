<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModlStmpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modl_stmp', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('MDST_MODL_ID');
            $table->unsignedBigInteger('MDST_STMP_ID');
            $table->double('MDST_RED')->default(0);
            $table->double('MDST_YELW')->default(0);
            $table->double('MDST_WHTE')->default(0);
            $table->foreign('MDST_MODL_ID')->references('id')->on('models')->onDelete('cascade');
            $table->foreign('MDST_STMP_ID')->references('id')->on('stamps')->onDelete('restrict');
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
        Schema::dropIfExists('modl_stmp');
    }
}
