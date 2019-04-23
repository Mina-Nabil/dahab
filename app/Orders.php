<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Orders extends Model
{
    //
    public static function getOrderHistory(){
      return DB::table('orders')
                  ->where('ORDR_STTS', '!=', 3)
                  ->orderBy('ORDR_DATE', 'desc')
                  ->orderBy('id', 'desc')
                  ->limit(100)->get();
    }

    public static function getOrderByID($id){
      return DB::table('orders')->find($id);
    }

    public static function getOrderItems($OrderID){
      return DB::table('order_items')->join('models', 'ORIT_MODL_ID', '=', 'models.id')->where('ORIT_ORDR_ID', '=', $OrderID)->get();
    }

    public static function getOrderStamps($OrderID){
      return DB::table('order_items')
                    ->select(DB::raw('sum(order_items.ORIT_CONT) as STMP_CONT, sum(MDST_RED * ORIT_CONT) as STMP_RED, sum(MDST_YELW * ORIT_CONT) as STMP_YELW, sum(MDST_WHTE * ORIT_CONT) as STMP_WHTE, MDST_RDMM , MDST_YLMM, MDST_WHMM,  STMP_SRNO'))
                    ->leftJoin('modl_stmp', 'ORIT_MODL_ID', '=', 'modl_stmp.MDST_MODL_ID')
                    ->leftJoin('stamps', 'stamps.id', '=', 'modl_stmp.MDST_STMP_ID')
                    ->where('order_items.ORIT_ORDR_ID', $OrderID)
                    ->groupBy('MDST_STMP_ID')
                    ->groupBy('MDST_RDMM')
                    ->groupBy('MDST_YLMM')
                    ->groupBy('MDST_WHMM')
                    ->get();
    }

    public static function insertOrder($orderItems, $clientName, $serialNumber = null, $comment = null){

      $redTotal = 0;
      $yellowTotal = 0;
      $whiteTotal = 0;



      foreach($orderItems as $item){
        $stamps = Models::getModelStamps($item['MODL_ID']);
        foreach($stamps as $stamp){
          $redTotal += $stamp->MDST_RED * $item['ORIT_CONT'];
          $yellowTotal += $stamp->MDST_YELW * $item['ORIT_CONT'];
          $whiteTotal += $stamp->MDST_WHTE * $item['ORIT_CONT'];
        }
      }
      $id =  DB::transaction(function () use ($orderItems, $redTotal, $yellowTotal, $whiteTotal, $clientName, $serialNumber , $comment ) {
        $id = DB::table('orders')->insertGetId([
          'ORDR_DATE' => date('Y-m-d'),
          'ORDR_CLNT'=> $clientName,
          'ORDR_SRNO'=> $serialNumber,
          'ORDR_CMNT'=> $comment,
          'ORDR_TOTL_RED'=> $redTotal,
          'ORDR_TOTL_WHTE'=> $whiteTotal,
          'ORDR_TOTL_YELW'=> $yellowTotal
        ]);

        foreach($orderItems as $item){
          DB::table('order_items')->insert([
            'ORIT_MODL_ID' => $item['MODL_ID'],
            'ORIT_CONT' => $item['ORIT_CONT'],
            'ORIT_ORDR_ID' => $id
          ]);
        }
        return $id;
      });
      return $id;
    }

    public static function editOrder($id, $orderItems, $clientName, $serialNumber = null, $comment = null){

      $redTotal = 0;
      $yellowTotal = 0;
      $whiteTotal = 0;

      foreach($orderItems as $item){
        $stamps = Models::getModelStamps($item['MODL_ID']);
        foreach($stamps as $stamp){
          $redTotal += $stamp->MDST_RED * $item['ORIT_CONT'];
          $yellowTotal += $stamp->MDST_YELW * $item['ORIT_CONT'];
          $whiteTotal += $stamp->MDST_WHTE * $item['ORIT_CONT'];
        }
      }

      DB::transaction(function () use ($id, $orderItems, $redTotal, $yellowTotal, $whiteTotal,  $clientName, $serialNumber , $comment ) {

        DB::table('order_items')->where('ORIT_ORDR_ID', $id)->delete();

        DB::table('orders')->where('id', $id)->update([
          'ORDR_CLNT'=> $clientName,
          'ORDR_SRNO'=> $serialNumber,
          'ORDR_CMNT'=> $comment,
          'ORDR_TOTL_RED'=> $redTotal,
          'ORDR_TOTL_WHTE'=> $whiteTotal,
          'ORDR_TOTL_YELW'=> $yellowTotal
        ]);

        foreach($orderItems as $item){
          DB::table('order_items')->insert([
            'ORIT_MODL_ID' => $item['MODL_ID'],
            'ORIT_CONT' => $item['ORIT_CONT'],
            'ORIT_ORDR_ID' => $id
          ]);
        }
      });

    }
      public static function confirmOrder($id){
        return DB::table('orders')->where([
          ['id', '=' ,$id],
          ['ORDR_STTS', '=', 1]
          ])->update(['ORDR_STTS' => 2]);
      }

      public static function cancelOrder($id){
        return DB::table('orders')->where([
          ['id', '=' ,$id],
          ['ORDR_STTS', '=', 1]
          ])->update(['ORDR_STTS' => 3]);
      }



}
