<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

     function login(Request $request){
      $incomingFields = $request->validate([
         'name' => 'required',
         'password' => 'required'
      ]);

      if( auth()->attempt(['name'=>$incomingFields['name'],'password'=> $incomingFields['password']])){
         $request->session()->regenerate();
      }
      return redirect('/');
     }


     function register(Request $request){
        $incomingFields = $request->validate([
           'name' => ['required',Rule::unique('users','name')],
           'email' => ['required ','email'],
           'phonenumber' => 'required',
           'password' => ['required','min:8','max:100']
        ]);
        $incomingFields['password']=bcrypt($incomingFields['password']);
        $user=User::create($incomingFields);
        auth()->login($user);
        return redirect('/');
     }


     function logout(){
      auth()->logout();
      return redirect('/');
     }
}
