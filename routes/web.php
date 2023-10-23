<?php

use App\Http\Controllers\JobController;
use App\Models\Job;
use App\Models\Post;
use App\Models\Type;
use App\Models\User;
use App\Models\Davomat;
use App\Models\Viloyat;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DavomatController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/home', [WorkController::class, 'index']);


Route::get('/', function () {
    $posts = Post::where('user_id', auth()->id())->get();
    $davomats = Davomat::where('user_id', auth()->id())->get();
    // ->select('davomats.id'); ko'rib chiqish kere
    return view('welcome', ['posts' => $posts, 'davomats' => $davomats]);
});
Route::get('/r', function () {
    $v = Viloyat::with('tumanlari')->get();
    return view('registration', compact('v'));
});
Route::post('/register', [UserController::class, 'register']);

Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);

Route::post('/create-post', [PostController::class, 'createPost']);

Route::get('/edit-post/{post}', [PostController::class, 'showEditScreen']);
Route::put('/edit-post/{post}', [PostController::class, 'actuallyUpdatePost']);
Route::delete('/delete-post/{post}', [PostController::class, 'deletePost']);

Route::post('/start', [DavomatController::class, 'startWork']);
Route::put('/stop/{davomat}', [DavomatController::class, 'stopWork']);

Route::get('/work', function () {
    $posts = Post::where('user_id', auth()->id())->get();
    $davomats = Davomat::where('user_id', auth()->id())->get();
    // ->select('davomats.id'); ko'rib chiqish kere
    return view('work', ['posts' => $posts, 'davomats' => $davomats]);
});

Route::get('/login', function () {
    return view('login');
});
Route::get('/loginadmin', function () {
    return view('loginadmin');
});

Route::get('/radmin', function () {
    return view('redistr-admin');
});
Route::post('/registr-admin', [AdminController::class, 'adminqoshish']);
Route::post('/login-admin', [AdminController::class, 'login']);
Route::post('/logout-admion', [AdminController::class, 'logout']);

Route::get('/admin', function () {
    if (auth()->guard('admin')) {
        $users = User::all();
        $davomats = Davomat::all();
        $jobs = Job::all();
        return view('admin', ['users' => $users, 'davomats' => $davomats, 'jobs' => $jobs]);
    }
    return view('loginadmin');

});

Route::get('/m', function () {
    return view('menu');
});

Route::post('/search', [WorkController::class, '']);

Route::get('/profil', function () {
    $jobs = Job::all();
    return view('user_profil', compact('jobs'));
});


Route::post('/create-job', [UserController::class, 'createJob'])->name('user.jobs.add');
Route::delete('/delete-job/{job}', [UserController::class, 'deleteJob']);

