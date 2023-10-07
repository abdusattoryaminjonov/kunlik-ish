<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    function login(Request $request){
        $incomingFields = $request->validate([
           'name' => 'required',
           'password' => 'required'
        ]);
  
        if( auth()->attempt(['name'=>$incomingFields['name'],'password'=> $incomingFields['password']])){
           $request->session()->regenerate();
        }
        return redirect('/admin');
       }
    function adminqoshish(Request $request){
        $incomingFields = $request->validate([
           'name' => ['required',Rule::unique('users','name')],
           'email' => ['required ','email'],
           'phonenumber' => 'required',
           'password' => ['required','min:8','max:100']
        ]);
        $incomingFields['password']=bcrypt($incomingFields['password']);
        $admin=Admin::create($incomingFields);
        auth()->login($admin);
        return redirect('/loginadmin');
    }
    function logout(){
      auth()->logout();
      return redirect('/loginadmin');
     }
}
