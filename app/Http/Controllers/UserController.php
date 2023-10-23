<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

   function login(Request $request)
   {
      $incomingFields = $request->validate([
         'name' => 'required',
         'password' => 'required'
      ]);

      if (auth()->attempt(['name' => $incomingFields['name'], 'password' => $incomingFields['password']])) {
         $request->session()->regenerate();
         return redirect('/');
      }
      return redirect('/login');
   }


   function register(Request $request)
   {
      $incomingFields = $request->validate([
         'name' => ['required', Rule::unique('users', 'name')],
         'surname' => 'required',
         'age' => 'required',
         'email' => ['required ', 'email'],
         'phonenumber' => 'required',
         'password' => ['required', 'min:8', 'max:100'],
         'mark' => ['nullable'],
         'place' => 'required'
      ]);
      $incomingFields['password'] = bcrypt($incomingFields['password']);
      //dd($incomingFields);
      $user = User::create($incomingFields);
      auth()->login($user);
      return redirect('/login');
   }

   public function createJob(Request $request)
   {
      $incomingFields = $request->validate([
         'name' => 'required',
      ]);

      auth()->user()->jobs()->attach($incomingFields['name']);
      // $incomingFields['name'] = strip_tags($incomingFields['name']);
      // $incomingFields['user_id'] = auth()->id();
      // Job::create($incomingFields);
      return redirect('/profil');
   }

   // function deleteJob(Type $job)
   // {
   //    if (auth()->user()->id === $job['user_id']) {
   //       $job->delete();
   //    }
   //    return redirect('/profil');
   // }
   function logout()
   {
      auth()->logout();
      return redirect('/login');
   }
}