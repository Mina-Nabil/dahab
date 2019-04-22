<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('model_types');
        Schema::create('model_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('MDTP_NAME');
        });


        Schema::dropIfExists('models');
        Schema::create('models', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('MODL_SRNO');
            $table->string('MODL_IMGE');
            $table->text('MODL_DESC');
            $table->unsignedInteger('MODL_MDTP_ID');
            $table->foreign('MODL_MDTP_ID')->references('id')->on('model_types');
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
        Schema::dropIfExists('model_types');
        Schema::dropIfExists('models');
    }
}
