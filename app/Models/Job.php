<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'jobs';
    protected $fillable = ['employer_id', 'title', 'slug', 'category', 'type', 'level', 'experience', 'qualification', 'description', 'salary', 'expiry_date', 'status'];

    protected $dates = ['expiry_date'];
    // protected $dateFormat = 'Y-m-d';

    public function jobseekers()
    {
        return $this->belongsToMany('App\Models\Jobseeker', 'jobseeker_jobs'); // pair with belongsToMany rel of Jobseeker model
    }

    public function employer()
    {
        return $this->belongsTo('App\Models\Employer', 'employer_id'); //pair with hasMany rel of Employer model
    }


    public function getExpiryDateAttribute($value)
    {
        return date('Y-m-d', strtotime($value));
    }
}
