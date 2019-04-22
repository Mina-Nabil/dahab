<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Models extends Model
{
    //Model Type functions
    public static function getModelTypes(){
        return DB::table('model_types')
                    ->orderBy('id', 'desc')
                    ->get();
    }

    public static function getModelTypeByID($id){
        return DB::table('model_types')->find($id);
    }

    public static function insertType($Name){
      return DB::table('model_types')->insertGetId(['MDTP_NAME' => $Name]);
    }

    public static function modifyType($id, $Name){
      return DB::table('model_types')->where('id', $id)->update(['MDTP_NAME' => $Name]);
    }


    //Model main functions
    public static function getModels(){
        return DB::table('models')->join('model_types', 'models.MODL_MDTP_ID', '=', 'model_types.id')
                    ->select('models.*', 'model_types.MDTP_NAME')
                    ->orderBy('id', 'desc')
                    ->get();
    }

    public static function getModelStamps($modelID){
      return DB::table('modl_stmp')->where('MDST_MODL_ID', $modelID)->get();
    }

    public static function getModelByID($id){
        return DB::table('models')->join('model_types', 'models.MODL_MDTP_ID', '=', 'model_types.id')
        ->select('models.*', 'model_types.MDTP_NAME')->where('models.id', $id)->first();
    }

    public static function insertModel($StampsArray, $SerialNumber, $typeID, $Desc, $Image){
      DB::transaction(function () use ($StampsArray, $SerialNumber, $typeID, $Desc, $Image) {
        $id = DB::table('models')->insertGetId([
          'MODL_SRNO' => $SerialNumber,
          'MODL_MDTP_ID' => $typeID,
          'MODL_DESC' => $Desc,
          'MODL_IMGE' => $Image
        ]);
        foreach ($StampsArray as $key => $value) {

          DB::table('modl_stmp')->insert([
            'MDST_MODL_ID' => $id,
            'MDST_STMP_ID' => $value['STMP_ID'],
            'MDST_RED'     => $value['red'],
            'MDST_YELW'    => $value['yellow'],
            'MDST_WHTE'    => $value['white']
          ]);
        }
        return $id;
      });
    }

    public static function updateModel($id, $StampsArray, $SerialNumber, $typeID, $Desc, $Image){
      DB::transaction(function () use ($id, $StampsArray, $SerialNumber, $typeID, $Desc, $Image) {
      $updateArray = [
        'MODL_SRNO' => $SerialNumber,
        'MODL_MDTP_ID' => $typeID,
        'MODL_DESC' => $Desc
      ];
      if(!is_null($Image)) $updateArray['MODL_IMGE'] = $Image;
      DB::table('models')->where('id', $id)->update($updateArray);

      DB::table('modl_stmp')->where('MDST_MODL_ID', $id)->delete();

      foreach ($StampsArray as $key => $value) {
        DB::table('modl_stmp')->insert([
          'MDST_MODL_ID' => $id,
          'MDST_STMP_ID' => $value['STMP_ID'],
          'MDST_RED'     => $value['red'],
          'MDST_YELW'    => $value['yellow'],
          'MDST_WHTE'    => $value['white']
        ]);
      }

        return;
      });
    }


}
