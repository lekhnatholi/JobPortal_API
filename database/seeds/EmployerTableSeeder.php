<?php

use Illuminate\Database\Seeder;
use App\Models\Employer;
use App\Models\Job;
use App\Models\Jobseeker;

class EmployerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(Jobseeker::class, 2)->create();

        // factory(Job::class, 15)
        //     ->create()
        //     ->each(function ($job) {
        //         $employer = factory(Employer::class)->make();
        //         $job->employer()->save($employer);

        //         $jobseekers = factory(Jobseeker::class, 2)->make();
        //         $job->jobseekers()->saveMany($jobseekers);
        //     });

        factory(Employer::class, 2)
            ->create()
            ->each(function ($employer) {
                for ($i = 0; $i < 10; $i++) {
                    $employer->jobs()
                        ->save(factory(Job::class)->make());
                        // ->each(function ($job) {
                        //     $job->jobseekers()
                        //         ->save(factory(Jobseeker::class)->make());
                        // });;
                }
            });
    }
}
