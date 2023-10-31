<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Viloyat;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class WorkController extends Controller
{
    public function index()
    {
        $jobs = Job::orderBy('name')->get();
        $v = Viloyat::with('tumanlari')->get();
        $works = Work::with('tuman', 'job')->get();
        return view('home', compact('v', 'jobs', 'works'));
    }
    public function createWork(Request $request)
    {
        $incomingFields = $request->validate([
            'title' => 'required|string|min:8',
            'description' => 'required',
            'place' => 'required',
            'date' => 'required',
            'job' => 'required',
            'workers' => 'required',
            'price' => 'required',
            'agreeables' => ['nullable']

        ]);
        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['description'] = strip_tags($incomingFields['description']);
        $incomingFields['place'] = strip_tags($incomingFields['place']);
        $incomingFields['date'] = strip_tags($incomingFields['date']);
        $incomingFields['job'] = strip_tags($incomingFields['job']);
        $incomingFields['workers'] = strip_tags($incomingFields['workers']);
        $incomingFields['price'] = strip_tags($incomingFields['price']);
        $incomingFields['user_id'] = auth()->id();
        Work::create($incomingFields);
        return redirect('/profil');
    }
    public function searchWorks(Request $request)
    {
        // Get the search value from the request
        $searchJob = $request->input('job');
        //$searchPlace = $request->input('place');

        // Search in the title and body columns from the posts table
        $works = Work::query()
            ->where('job', 'LIKE', "%{$searchJob}%")
            //->orWhere('place', 'LIKE', "%{$searchPlace}%")
            ->get();

        // Return the search view with the resluts compacted
        return view('searchJob', compact('works'));
    }

}
