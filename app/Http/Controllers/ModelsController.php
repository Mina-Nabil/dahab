<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models;
use App\Stamps;

class ModelsController extends Controller
{
    //
    public function __construct(){
      $this->middleware('auth');
    }

    public function typesPage($id = null, Request $request){

      if(isset($request->typeName)){
        if(!is_null($id) && is_numeric($id)){
          Models::modifyType($id, $request->typeName);
          $id=null;
        } else {
          Models::insertType($request->typeName);
        }
      }

      $data['Types'] = Models::getModelTypes();
      if(!is_null($id)){
        $data['selectedType'] = Models::getModelTypeByID($id);
        $data['formTitle']   = 'تعديل نوع موديل ( ' . $data['selectedType']->MDTP_NAME . ' )';
        $data['buttonText']  = 'تعديل نوع موديل';
        $data['formURL']     = url('models/types/' . $data['selectedType']->id);
      } else {
        $data['formTitle']   = 'اضافه نوع موديل';
        $data['buttonText']  = 'اضافه';
        $data['formURL']     = url('models/types/');
      }

      return view('models.types', $data);

    }

    public function show($id = null){
      $data['Models'] = Models::getModels();

      return view('models.show', $data);
    }

    public function addPage($id=null){

      $data['types']            = Models::getModelTypes();
      $data['Stamps']           = Stamps::getStamps();

      if(isset($id) && $id > 0){
        $data['model']          = Models::getModelByID($id);
        $data['ModelStamps']      = Models::getModelStamps($id);
        $data['formURL']        = url("models/modify/" . $id);
        if(is_null($data['model']))  abort(404);

        $data['pageDescription']  = " تعديل موديل " . $data['model']->MODL_SRNO;
        $data['pageTitle']        = "تعديل موديل";
      } else {
        $data['pageTitle']        = "اضافه موديل";
        $data['pageDescription']  = "اضافه موديل جديد";
        $data['formURL']          = url("models/insert");

      }

      return view('models.add', $data);
    }

    public function insert(Request $request){
      $validatedDate = $request->validate([
          'model_serial' => 'required',
          'MODL_MDTP_ID' => 'required'
      ]);

      $path = null;
      if ($request->hasFile('photo')) {
          $path = $request->photo->store('images/models', 'public');
      }

      $Stamps = $this->getStampArray($request);

      $id = Models::insertModel($Stamps, $request->input('model_serial'), $request->input('MODL_MDTP_ID'), $request->input('MODL_DESC'), $path);

      return redirect('models/show') ;

    }

    public function modify($id, Request $request){
      $validatedDate = $request->validate([
          'model_serial' => 'required',
          'MODL_MDTP_ID' => 'required'
      ]);

      $path = null;
      if ($request->hasFile('photo')) {
          $path = $request->photo->store('images/models', 'public');
      }

      $Stamps = $this->getStampArray($request);

      Models::updateModel($id, $Stamps, $request->input('model_serial'), $request->input('MODL_MDTP_ID'), $request->input('MODL_DESC'), $path);

      return redirect('models/show') ;

    }

    private function getStampArray($RequestArray){
      $Stamps = array();
      foreach($RequestArray->input('stamp') as $key => $stamp){

        $Stamps[$key] =
          [
          'STMP_ID' => $stamp,
          'red'     => ($RequestArray->input('red')[$key]) ? ($RequestArray->input('red')[$key]) : 0,
          'yellow'  => ($RequestArray->input('yellow')[$key]) ? ($RequestArray->input('yellow')[$key]) : 0,
          'white'   => ($RequestArray->input('white')[$key]) ? ($RequestArray->input('white')[$key]): 0,
          'rdmm'  => ($RequestArray->input('rdmm')[$key]) ? ($RequestArray->input('rdmm')[$key]) : 0,
          'ylmm'  => ($RequestArray->input('ylmm')[$key]) ? ($RequestArray->input('ylmm')[$key]) : 0,
          'whmm'  => ($RequestArray->input('whmm')[$key]) ? ($RequestArray->input('whmm')[$key]) : 0
        ];
      }
      return $Stamps;
    }
}
