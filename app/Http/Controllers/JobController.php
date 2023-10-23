<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function createJob(Request $request)
    {
        $incomingFields = $request->validate([
            'name' => 'required'
        ]);
        $job = Job::create($incomingFields);
        return redirect('/admin');
    }
    function deleteJob(Job $job)
    {
        $job->delete();
        return redirect('/admin');
    }
}
