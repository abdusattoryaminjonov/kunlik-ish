<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use App\Models\Work;
use App\Models\Viloyat;
use App\Notifications\Jo_apply;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class WorkController extends Controller
{
    public function index()
    {
        $jobs = Job::orderBy('name')->get();
        $v = Viloyat::with('tumanlari')->get();
        $works = Work::popular()->with('tuman', 'jobrel')->orderByDesc('date')->paginate(6); //->get();
        return view('home', compact('v', 'jobs', 'works'));
    }
    public function createWork(Request $request)
    {
        $incomingFields = $request->validate([
            'title' => 'required|string|min:8',
            'description' => 'required|string',
            'place' => 'required|int',
            'date' => 'required|date',
            'job' => 'required',
            'workers' => 'required',
            'price' => 'required',
            'agreeables' => 'nullable|array'

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
        $searchJob = $request->input('job', 0);
        $searchPlace = $request->input('place', 0);

        $works = Work::query();
        $jobs = Job::orderBy('name')->get();
        $v = Viloyat::with('tumanlari')->get();

        if ($searchJob !== 0) {
            $works = $works->where('job', $searchJob);
        }

        if ($searchPlace !== 0) {
            $works = $works->where('place', $searchPlace);
        }
        $works = $works->with('tuman', 'jobrel')->orderByDesc('id')->paginate(6);
        return view('search', compact('v', 'jobs', 'works'));
    }

    public function userINWork(Request $request, User $user)
    {
        // $workersNotif = [
        //     'body' => 'Yangi habar',
        //     'userdata' => '',
        //     'url' => url('/profil'),
        //     'raxmat' => 'Senda 14kun bor'
        // ];

        auth()->user()->works()->attach($request->input('work_id'), ['status' => 0]);
        //$user->notify(new Jo_apply($workersNotif));
        return redirect('/home');
    }




    public function deleteWork(Work $work)
    {

        if (auth()->user()->id === $work['user_id']) {
            $work->delete();
        }
        return redirect('/profil');
    }

}
