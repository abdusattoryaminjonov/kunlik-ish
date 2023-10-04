<?php

namespace App\Http\Controllers;

use App\Models\Davomat;
use Illuminate\Http\Request;

class DavomatController extends Controller
{
    public function startWork(Request $request){
        $input=$request->validate([
            'timeStart'=>'required',
            'timeStop'=>'required'
        ]);
        $input['time_start']= strip_tags($input['timeStart']);
        $input['time_stop']= strip_tags($input['timeStop']);
        $input['user_id']= auth()->id();
        Davomat::create($input);
         return redirect('/work');

    }
    public function stopWork(Davomat $davomat,Request $request){
        if(auth()->user()->id != $davomat['user_id']){
            return redirect('/');
        }
        $incomingFields=$request->validate([
            'timeStart'=>'required',
            'timeStop'=>'required'
         ]);
         $incomingFields['time_start']= strip_tags($incomingFields['timeStart']);
         $incomingFields['time_stop']= strip_tags($incomingFields['timeStop']);
         $davomat->update($incomingFields);
         return redirect('/'); 
    }
    public function showEditScreen(Davomat $davomat){
        if(auth()->user()->id != $davomat['user_id']){
            return redirect('/');
        }
        return view('',['davomat'=>$davomat]);
    }
}
