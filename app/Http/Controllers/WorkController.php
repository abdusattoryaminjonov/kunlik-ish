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
        $works = Work::with('tuman', 'jobrel')->get();
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

    public function editWork(Request $request, Work $work)
    {
        if (auth()->user()->id != $work['user_id']) {
            return redirect('/profil');
        }
        $incomingFields = $request->validate([
            'title' => 'required|string|min:8',
            'description' => 'required',
            'place' => 'required',
            'date' => 'required',
            'job' => 'required',
            'workers' => 'required',
            'price' => 'required',
        ]);
        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['description'] = strip_tags($incomingFields['description']);
        $incomingFields['place'] = strip_tags($incomingFields['place']);
        $incomingFields['date'] = strip_tags($incomingFields['date']);
        $incomingFields['job'] = strip_tags($incomingFields['job']);
        $incomingFields['workers'] = strip_tags($incomingFields['workers']);
        $incomingFields['price'] = strip_tags($incomingFields['price']);
        $work->update($incomingFields);
        return redirect('/profil');

    }
    public function searchWorks(Request $request)
    {
        // Get the search value from the request
        $searchJob = $request->input('job');
        $searchPlace = $request->input('place');

        // Search in the title and body columns from the posts table
        if ($searchJob != 0 and $searchPlace != 0) {

            $works = Work::query()
                ->where('job', $searchJob)
                ->where('place', $searchPlace)
                ->get();
            $jobs = Job::orderBy('name')->get();
            $v = Viloyat::with('tumanlari')->get();
            $works = Work::with('tuman', 'jobrel')->get();
            return view('search', compact('v', 'jobs', 'works'));
        } elseif ($searchJob != 0) {
            $works = Work::query()
                ->where('job', $searchJob)
                ->get();
            $jobs = Job::orderBy('name')->get();
            $v = Viloyat::with('tumanlari')->get();
            $works = Work::with('tuman', 'jobrel')->get();
            return view('search', compact('v', 'jobs', 'works'));
        } elseif ($searchPlace != 0) {
            $works = Work::query()
                ->where('place', $searchPlace)
                ->get();
            $jobs = Job::orderBy('name')->get();
            $v = Viloyat::with('tumanlari')->get();
            $works = Work::with('tuman', 'jobrel')->get();
            return view('search', compact('v', 'jobs', 'works'));
        }
        return redirect('home');
    }
    public function deleteWork(Work $work)
    {
        if (auth()->user()->id === $work['user_id']) {
            $work->delete();
        }
        return redirect('/profil');
    }

}
