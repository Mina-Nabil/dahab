<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Stamps extends Model
{
    //
    public static function getStamps(){
      return DB::table('stamps')
                  ->orderBy('id', 'desc')
                  ->get();
    }

    public static function getStampByID($id){
      return DB::table('stamps')->where('id', $id)->first();
    }

    public static function insertStamp($SerialNumber, $Image = null, $Desc = null){
      return DB::table('stamps')->insert([
        'STMP_SRNO' =>  $SerialNumber,
        'STMP_IMGE' =>  $Image,
        'STMP_DESC' =>  $Desc
      ]);
    }

    public static function updateStamp($id, $SerialNumber, $Image = null, $Desc = null){
      $updateArray = [
        'STMP_SRNO' =>  $SerialNumber,
        'STMP_DESC' =>  $Desc
      ];
      if(!is_null($Image))$updateArray['STMP_IMGE'] = $Image;

      return DB::table('stamps')->where('id', $id)->update($updateArray);
    }
}
