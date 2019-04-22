<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Add nullable options for Models
        Schema::table('models', function(Blueprint $table){
          $table->string('MODL_IMGE')->nullable()->change();
          $table->string('MODL_DESC')->nullable()->change();
        } );

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
