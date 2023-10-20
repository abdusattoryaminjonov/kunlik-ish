<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Viloyat;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    public function index(){
        $jobs = Type::where('user_id', auth()->id())->get();
        $v=Viloyat::with('tumanlari')->get();
        return view('home',compact('v','jobs'));
    }
}
