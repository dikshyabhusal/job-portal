<?php

namespace App\Http\Controllers;
use App\Models\Application;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\ApplicationAcceptedMail;
use App\Mail\ApplicationRejectedMail;
use Illuminate\Support\Facades\Mail;

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

        // public function index()
        // {
        //     $applications = Application::with('job')->latest()->get();
        //     return view('applications.index', compact('applications'));
        // }
        public function index()
        {
            $user = Auth::user();

            // Only get applications for jobs posted by the current user
            $applications = Application::whereHas('job', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->with('job')->get();

            return view('applications.index', compact('applications'));
        }

        public function admin()
        {
            $applications = Application::with('job')->latest()->get();
            return view('admin.index', compact('applications'));
        }

        public function myApplications()
        {
            $jobs = Job::where('user_id', auth()->id())
                        ->with('applications')
                        ->get();
            
            return view('applications.my_applications', compact('jobs'));
            
        }


        public function accept($id)
{
    $application = Application::findOrFail($id);
    $application->status = 'accepted';
    $application->save();

    // Send email
    Mail::to($application->email)->send(new ApplicationAcceptedMail($application));

    return back()->with('success', 'Application accepted and email sent.');
}

public function reject($id)
{
    $application = Application::findOrFail($id);
    $application->status = 'rejected';
    $application->save();

    // Send email
    Mail::to($application->email)->send(new ApplicationRejectedMail($application));

    return back()->with('success', 'Application rejected and email sent.');
}


}        


