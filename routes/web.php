<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
});
Route::get('/jobs', function () {
    $jobs = Job::with('employer')->get(); //EAGER LOADING, to avoid N+1 query problem (if I request the employer with $job->employer once the job has been already retrieved with a db query, it is lazy loaded
    //a new query is performed - if we already now that the employer is needed, it must be eager loaded so that the query is only one
    return view('jobs', [
        'jobs' => $jobs
    ]);
});

Route::get('/jobs/{id}', function ($id) {
//    \Illuminate\Support\Arr::first($jobs, function($job) use ($id){
//       return $job['id'] == $id;
//    });
//equivalent to
    $job = Arr::find($id);

    return view('job', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});
