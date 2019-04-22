<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Auth;

class UserController extends Controller
{

    
    //User controller handles creation / addition of users
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(){
        $data['users'] = User::getUsers();
        return view('users.show', $data);
    }
    
    public function profile($id){
        $data['user'] = User::getUserByID($id);
        
        $data['types'] = User::getTypes();
        $data['pageTitle'] = 'تعديل مستخدم';
        $data['pageDescription'] = 'استخدم الصفحه لتعحديل مستخدم';
        $data['formURL']        = url('users/update/' . $id);
        $data['isPassNeeded']   = false;
        
        return view('users.add', $data);
    }
    
    public function add(){
        $data['types'] = User::getTypes();
        $data['pageTitle'] = 'اضافه مستخدم';
        $data['pageDescription'] = 'استخدم الصفحه لاضافه مستخدم جديد';
        $data['formURL']        = route('users/insert');     
        $data['isPassNeeded']   = true;

        return view('users.add', $data);
    }

    public function insert(Request $request){

        $validatedDate = $request->validate([
            'username' => 'required',
            'typeID' => 'required',
            'password' => 'required',
        ]);
        $path = null;
        if ($request->hasFile('photo')) {
            $path = $request->photo->store('images/users', 'public');
        }
        $id = User::insertUser($request->input('username'), $request->input('fullname'), $request->input('typeID'), $request->input('mobNumber'), $request->input('password'), $path);
        if ($id )
            return redirect('users/show') ;
        else
            return redirect('users/add');
    }

    public function update($id, Request $request){

        $validatedDate = $request->validate([
            'username' => 'required',
            'typeID' => 'required',
        ]);
        $path = null;
        if ($request->hasFile('photo')) {
            $path = $request->photo->store('images/users', 'public');
        }
        User::updateUser($id, $request->input('username'), $request->input('fullname'), $request->input('typeID'), $request->input('mobNumber'), $request->input('password'), $path);
        return redirect('users/show') ;
        
    }
}
