<?php

namespace App\Http\Controllers;
use App\Models\Application;
use App\Models\Job;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function create($jobId)
    {
        $job = Job::findOrFail($jobId);
        return view('applications.create', compact('job'));
    }

    public function store(Request $request){
            $validated = $request->validate([
                'job_id' => 'required|exists:job,id',
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'cover_letter' => 'nullable',
                'years_of_experience' => 'required|integer|min:0|max:50',
                'cv' => 'nullable|mimes:pdf,doc,docx|max:2048',
            ]);
        
            if ($request->hasFile('cv')) {
                $validated['cv'] = $request->file('cv')->store('cvs', 'public');
            }
        
            Application::create($validated);
        
            return redirect('/browse_jobs')->with('success', 'Application submitted successfully!');
        }

        public function index()
        {
            $applications = Application::with('job')->latest()->get();
            return view('applications.index', compact('applications'));
        }

        public function myApplications()
        {
            $jobs = Job::where('user_id', auth()->id())
                        ->with('applications')
                        ->get();
            
            return view('applications.my_applications', compact('jobs'));
            
        }


}        


