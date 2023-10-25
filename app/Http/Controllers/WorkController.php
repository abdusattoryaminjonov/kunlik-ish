<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Viloyat;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class WorkController extends Controller
{
    public function index(){
        $jobs = Job::orderBy('name')->get();
        $v=Viloyat::with('tumanlari')->get();
        return view('home',compact('v','jobs'));
    }
    public function createWork(Request $request){
        $incomingFields = $request->validate([
            'title' =>[ 'required', Rule::unique('title')],
            'description'=> 'required',
            'place' => 'required',
            'date' => 'required',
            'job' => 'required',
            'workers' => 'required',
            'price' => 'required',
            'agreeables' => 'required'
        ]);
        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['description'] = strip_tags($incomingFields['description']);
        $incomingFields['place'] = strip_tags($incomingFields['place']);
        $incomingFields['date'] = strip_tags($incomingFields['date']);
        $incomingFields['job'] = strip_tags($incomingFields['job']);
        $incomingFields['workers'] = strip_tags($incomingFields['workers']);
        $incomingFields['price'] = strip_tags($incomingFields['price']);
        $incomingFields['agreeables'] = strip_tags($incomingFields['agreeables']);
        $incomingFields['user_id'] = auth()->id();
        Work::create($incomingFields);
        return redirect('/profil');
    }
}
