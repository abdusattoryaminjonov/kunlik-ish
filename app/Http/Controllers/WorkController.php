<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Viloyat;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    public function index(){
        $jobs = Job::orderBy('name')->get();
        $v=Viloyat::with('tumanlari')->get();
        return view('home',compact('v','jobs'));
    }
}
