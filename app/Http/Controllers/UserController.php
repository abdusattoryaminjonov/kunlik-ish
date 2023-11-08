<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Job;
use App\Models\User;
use App\Models\Viloyat;
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

   public function editUser(Request $request)
   {
      $user = Auth::user();
      $user->name = $request->input('name');
      $user->surname = $request->input('surname');
      $user->age = $request->input('age');
      $user->email = $request->input('email');
      $user->phonenumber = $request->input('phonenumber');
      $user->place = $request->input('place');
      $user->save();
      return redirect('profil');
   }

   public function changePassword(Request $request)
   {
      $user = Auth::user();
      $user->password = bcrypt($request->input('password'));
      $user->save();
      return redirect('profil');
   }

   public function showUser(int $id)
   {
      $user = User::find($id);
      //$jobs = Job::orderBy('name')->get();
      return view('show_user', compact('user'));
   }


   public function createJob(Request $request)
   {
      $incomingFields = $request->validate([
         'name' => 'required',
      ]);

      auth()->user()->jobs()->attach($incomingFields['name']);
      return redirect('/profil');
   }

   function deleteJob(Job $job)
   {
      // dd($job);
      auth()->user()->jobs()->detach($job->id);
      $job->delete();
      return redirect('/profil');
   }
   function logout()
   {
      auth()->logout();
      return redirect('/login');
   }
}