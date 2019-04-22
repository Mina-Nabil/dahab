<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orders;
use App\Models;

class OrdersController extends Controller
{
    //
    public function __construct(){
      $this->middleware('auth');
    }


    public function home(){
      $data['Orders'] = Orders::getOrderHistory();
      return view('orders.show', $data);
    }

    public function startNewOrder($id = null){
      $data['models'] = Models::getModels();
      $data['isDynamicForm'] = true;

      if(isset($id) && $id > 0){
        $data['order']          = Orders::getOrderByID($id);
        $data['orderItems']      = Orders::getOrderItems($id);
        $data['isDynamicForm'] = true;
        $data['formURL']        = url("orders/edit/" . $id);
        if(is_null($data['order']))  abort(404);

        $data['pageDescription']  = " تعديل طلب " . $data['order']->id . " \ " .$data['order']->ORDR_SRNO;
        $data['pageTitle']        = "تعديل طلب";
      } else {
        $data['pageTitle']        = "اضافه طلب";
        $data['pageDescription']  = "اضافه طلب جديد";
        $data['isDynamicForm'] = true;
        $data['formURL']          = url("orders/insert");

      }

      return view('orders.add', $data);
    }

    public function profile($id){
      $data['order'] = Orders::getOrderByID($id);
      $data['items'] = Orders::getOrderItems($id);
      $data['stamps'] = Orders::getOrderStamps($id);

      return view('orders.profile', $data);
    }

    public function insertOrder(Request $request){
      $itemsArray = $this->getOrderItemsArray($request);
      $id = Orders::insertOrder($itemsArray, $request->clientName, $request->serialNumber, $request->comment);

      return redirect( "orders/profile/" . $id);
    }

    public function editOrder($id, Request $request){
      $itemsArray = $this->getOrderItemsArray($request);
      Orders::editOrder($id, $itemsArray, $request->clientName, $request->serialNumber, $request->comment);

      return redirect( "orders/profile/" . $id);
    }

    public function cancelOrder($id){
      Orders::cancelOrder($id);
      return redirect("/home");
    }

    public function confirmOrder($id){
      Orders::confirmOrder($id);
      return redirect("/orders/profile/" . $id);
    }


    private function getOrderItemsArray($requestArray){
      $ret = array();

      foreach($requestArray['MODL_ID'] as $key => $item){
        $ret[$key] =  ['MODL_ID' => $item, 'ORIT_CONT' => $requestArray->input('ORIT_CONT')[$key]];
      }

      return $ret;
    }



}
