<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminController extends Authenticatable
{
   use Notifiable;
   function login(Request $request)
   {
      $incomingFields = $request->validate([
         'name' => 'required',
         'password' => 'required'
      ]);
      dd($request);
      // Muhim joyi esda qosin "guard('admin')"
      if (auth()->guard('admin')->attempt(['name' => $incomingFields['name'], 'password' => $incomingFields['password']])) {
         $request->session()->regenerate();
         return redirect('/admin');
      }
      return redirect('/loginadmin');
   }
   function adminqoshish(Request $request)
   {
      $incomingFields = $request->validate([
         'name' => ['required', Rule::unique('admins', 'name')],
         'email' => ['required ', 'email'],
         'phonenumber' => 'required',
         'password' => ['required', 'min:8', 'max:100']
      ]);
      $incomingFields['password'] = bcrypt($incomingFields['password']);
      $admin = Admin::create($incomingFields);
      auth()->login($admin);
      return redirect('/loginadmin');
   }
   function logout()
   {
      auth()->logout();
      return redirect('/loginadmin');
   }
}