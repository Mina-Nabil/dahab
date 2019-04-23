<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateModlstampTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('modl_stmp', function (Blueprint $table){
          $table->double('MDST_RDMM')->default(0);
          $table->double('MDST_YLMM')->default(0);
          $table->double('MDST_WHMM')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('modl_stmp', function (Blueprint $table){
          $table->dropColumn('MDST_RDMM');
          $table->dropColumn('MDST_YLMM');
          $table->dropColumn('MDST_WHMM');
        });
    }
}
