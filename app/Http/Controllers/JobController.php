<?php

namespace App\Http\Controllers;
use App\Models\Job;
use Illuminate\Support\Facades\Mail;
use \App\Mail\JobPosted;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class JobController extends Controller
{
    public function index() {
        //        dd('Hello');
                $jobs = Job::with('employer')->latest()->simplePaginate(5);
                return view('jobs.index', [
                'jobs' => $jobs]);
            
            }
        
            public function create() {
                return view('jobs.create');
            }
        
            public function show(Job $job) {
                 // $job = Job::find($id);
                // //dd($job); //dump and die, quicly see and dump 
                return view('jobs.show', ['job' => $job]);
            }
        
            public function store() {
                 // debugging dd(request()->all());
                 request()->validate([
                    'title' => ['required', 'min:3'],
                    'salary' => ['required', ],
                ]);
        
                $job = Job::create([
                    'title' => request('title'),
                    'salary' => request('salary'),
                    'employer_id' => 1
                ]);
                
                Mail::to($job->employer->user)->queue(
                    new JobPosted($job));

                return redirect('/jobs');
        
            }
        
            public function edit(Job $job) {

                //dd($job); //dump and die, quicly see and dump 

                return view('jobs.edit', ['job' => $job]);
            }
        
            public function update(Job $job) {
                //authorize (on hold)
                request()->validate([
                    'title' => ['required', 'min:3'],
                    'salary' => ['required', ],
                ]);
        
                $job->update([
                    'title'=>request('title'),
                    'salary'=>request('salary'),
                ]);
                return redirect('/jobs/' . $job->id);
                // redirect to the job specific page
            }
        
            public function destroy(Job $job) {
                //authorize (on hold)
                $job->delete(); //short version inline
                return redirect('/jobs');
        
            }
}
