<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Report;
use Illuminate\Http\Request;
use App\Http\Requests\StoreReportRequest;
use App\Http\Requests\UpdateReportRequest;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        if(auth()->id() == $request['kimga'] ){
            return redirect('home');
        }
        $data = $request->all();
        $data['userId'] = $request['kimga'];
        $data['author'] = auth()->id();
        unset($data["_token"]);
        unset($data["kimga"]);
        Report::create($data);

        $avg = Report::where('userId', $data['userId'])->avg('ball');
        $count = Report::where('userId', $data['userId'])->count();

        $user=User::find($data['userId']);
        $user->users_ball=$avg;
        $user->users_ball_count=$count;
        $user->save();
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReportRequest $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        //
    }
}
