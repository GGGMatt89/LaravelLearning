<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

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

        Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => '1'
        ]);

        return redirect('/jobs');
    }

    public function edit(Job $job)
    {
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
