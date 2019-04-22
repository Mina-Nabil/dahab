<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stamps;

class StampsController extends Controller
{
    //
    function __construct(){
      $this->middleware('auth');
    }

    public function show(){

      $data['Stamps'] = Stamps::getStamps();
      return view('stamps.show', $data);

    }

    public function addPage($id = null){

      if(isset($id) && $id > 0){
        $data['stamp']          = Stamps::getStampByID($id);
        $data['formURL']        = url("stamps/modify/" . $id);
        $data['pageDescription']  = " تعديل اسطمبة " . $data['stamp']->STMP_SRNO;
        $data['pageTitle']        = "تعديل اسطمبة";
      } else {
        $data['pageTitle']        = "اضافه اسطمبة";
        $data['pageDescription']  = "اضافه اسطمبة جديده";
        $data['formURL']          = url("stamps/insert");

      }

      return view('stamps.add', $data);

    }

    public function insert(Request $request){
      $validatedData = $request->validate([
        'stamp_serial' => 'required'
      ]);

      $path = null;
      if($request->hasFile('photo')){
        $path = $request->photo->store('images/stamps', 'public');
      }
      Stamps::insertStamp($request->stamp_serial, $path, $request->STMP_DESC);

      return redirect('stamps/show');
    }

    public function modify($id, Request $request){
      $validatedData = $request->validate([
        'stamp_serial' => 'required'
      ]);

      $path = null;
      if($request->hasFile('photo')){
        $path = $request->photo->store('images/stamps', 'public');
      }
      Stamps::updateStamp($id, $request->stamp_serial, $path, $request->STMP_DESC);

      return redirect('stamps/show');
    }




}
