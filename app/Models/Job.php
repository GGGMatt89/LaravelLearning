<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Support\Arr;

class Job extends Model {
    use HasFactory;
//    public static function all(): array
//    {
//
//    }
//
//    public static function find(int $id): array
//    {
//        $job = Arr::first(static::all(), fn($job) =>  $job['id'] == $id);
//
//        if(! $job) {
//            abort(404);
//        }
//
//        return $job;
//    }
    protected $table = "job_listings";
    protected $fillable = ['title', 'salary', 'employer_id'];

//    protected $guarded = []; setting to empty will disable the mass assignment check for all fields - opposite of $fillable array

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, foreignPivotKey: "job_listing_id");
    }
}
