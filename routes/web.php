<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('home');
//});
//equivalent to
Route::view('/', 'home');

//Index

//Route::get('/jobs', function () {
//    $jobs = Job::with('employer')->latest()->simplePaginate(3); //EAGER LOADING, to avoid N+1 query problem (if I request the employer with $job->employer once the job has been already retrieved with a db query, it is lazy loaded
//    //a new query is performed - if we already now that the employer is needed, it must be eager loaded so that the query is only one
//    //plus adding pagination
//    return view('jobs.index', [
//        'jobs' => $jobs
//    ]);
//});

//Create

//Route::get('jobs/create', function () {
//    return view('jobs.create');
//});

//Show without Route Model Binding
//Route::get('/jobs/{id}', function ($id) {
//    \Illuminate\Support\Arr::first($jobs, function($job) use ($id){
//       return $job['id'] == $id;
//    });
//equivalent to
//    $job = Job::find($id);
//
//    return view('jobs.show', ['job' => $job]);
//});

//Show with Route Model Binding
// -> identical wildcard and parameter name
// -> primary key is called i -> to change this, configuration needed
//Route::get('/jobs/{job}', function (Job $job) {
//    return view('jobs.show', ['job' => $job]);
//});

//Store
//Route::post('/jobs', function(){
//    request()->validate([
//        'title' =>['required', 'min:3'],
//        'salary' => ['required']
//    ]);
//
//    Job::create([
//        'title' => request('title'),
//        'salary' => request('salary'),
//        'employer_id' => '1'
//    ]);
//
//    return redirect('/jobs');
//});


//Edit
//Route::get('/jobs/{job}/edit', function (Job $job) {
//    return view('jobs.edit', ['job' => $job]);
//});


//Update
//Route::patch('/jobs/{job}', function (Job $job) {
//    //authorize -> to be done
//    //validate
//    request()->validate([
//        'title' =>['required', 'min:3'],
//        'salary' => ['required']
//    ]);
//    //update the job and persist
//
//    $job->title = request('title');
//    $job->salary = request('salary');
//    $job->save();
//
//    //equivalent to
//    // $job->update([
////          'title' => request('title'),
////          'salary' => request('salary'),
//    //]);
//
//    //redirect to the job page
//    return redirect('/jobs/'. $job->id);
//});


//Destroy
//Route::delete('/jobs/{job}', function (Job $job) {
//    //authorize -> to be done
//    //find and delete the job
//    $job->delete();
//
//    //redirect
//    return redirect('/jobs');
//
//});

//grouping routes referring to the same controller
//Route::controller(JobController::class)->group(function(){
//    Route::get('/jobs','index');
//    Route::get('/jobs/create','create');
//    Route::get('/jobs/{job}','show');
//    Route::post('/jobs','store');
//    Route::get('/jobs/{job}/edit','edit');
//    Route::patch('/jobs/{job}','update');
//    Route::delete('/jobs/{job}','destroy');
//});
//Route::get('/jobs', [JobController::class, 'index']);
//Route::get('/jobs/create', [JobController::class,'create']);
//Route::get('/jobs/{job}', [JobController::class,'show']);
//Route::post('/jobs', [JobController::class,'store']);
//Route::get('/jobs/{job}/edit', [JobController::class, 'edit']);
//Route::patch('/jobs/{job}', [JobController::class, 'update']);
//Route::delete('/jobs/{job}', [JobController::class, 'destroy']);

//use resource to register default routes for all CRUD functions
Route::resource('jobs', JobController::class); //
//if we want to use a selected bunch of default routes for CRUD functions
//Route::resource('jobs', JobController::class, ['except' => ['show']]); //except show']);
//Route::resource('jobs', JobController::class, ['only' => ['show']]); //only show']);


//Route::get('/contact', function () {
//    return view('contact');
//}); =>
Route::view('/contact', 'contact');
