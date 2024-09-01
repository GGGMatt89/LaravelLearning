<?php

namespace App\Http\Controllers;

use App\Mail\JobPosted;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('employer')->latest()->simplePaginate(3); //EAGER LOADING, to avoid N+1 query problem (if I request the employer with $job->employer once the job has been already retrieved with a db query, it is lazy loaded
        //a new query is performed - if we already now that the employer is needed, it must be eager loaded so that the query is only one
        //plus adding pagination
        return view('jobs.index', [
            'jobs' => $jobs
        ]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    public function store()
    {
        request()->validate([
            'title' =>['required', 'min:3'],
            'salary' => ['required']
        ]);

        $job = Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => '1'
        ]);

       Mail::to($job->employer->user)->queue(
            new JobPosted($job)
        );

        return redirect('/jobs');
    }

    public function edit(Job $job)
    {
        //Gate::define('edit-job', function(User $user, Job $job){
        //    return $job->employer->user->is($user);
        //});
        //definition moved to AppServicProvider boot method, so the Gate is available for every request
        //if(Auth::guest())
        //{
         //   return redirect('/login');
        //}-> already handled by the Gate

        //Gate::authorize('edit-job', $job);
        //Auth::user()->can('edit-job', $job);//equivalent to Gate above
        //all defined with middleware at the Route level


        return view('jobs.edit', ['job' => $job]);
    }

    public function update(Job $job)
    {
        //authorize -> to be done
        //validate
        request()->validate([
            'title' =>['required', 'min:3'],
            'salary' => ['required']
        ]);
        //update the job and persist

        $job->title = request('title');
        $job->salary = request('salary');
        $job->save();

        //equivalent to
        // $job->update([
//          'title' => request('title'),
//          'salary' => request('salary'),
        //]);

        //redirect to the job page
        return redirect('/jobs/'. $job->id);
    }

    public function destroy(Job $job)
    {
        //authorize -> to be done
        //find and delete the job
        $job->delete();

        //redirect
        return redirect('/jobs');
    }
}
