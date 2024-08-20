<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/jobs', function () {
    return view('jobs', [
        'jobs' => [
            [
                'id' => '1',
                'title' => 'Director',
                'salary' => '100000'
            ],
            [
                'id' => '2',
                'title' => 'Manager',
                'salary' => '150000'
            ],
            [
                'id' => '3',
                'title' => 'Developer',
                'salary' => '80000'
            ]
        ]
    ]);
});

Route::get('/jobs/{id}', function ($id) {
    $jobs = [
        [
            'id' => '1',
            'title' => 'Director',
            'salary' => '100000'
        ],
        [
            'id' => '2',
            'title' => 'Manager',
            'salary' => '150000'
        ],
        [
            'id' => '3',
            'title' => 'Developer',
            'salary' => '80000'
        ]
    ];
//    \Illuminate\Support\Arr::first($jobs, function($job) use ($id){
//       return $job['id'] == $id;
//    });
//equivalent to
    $job = Arr::first($jobs, fn($job) =>  $job['id'] == $id);

    return view('job', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});
