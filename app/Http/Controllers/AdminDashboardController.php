<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AdminDashboardController extends Controller
{
    public function index()
{
    $jobSeekersCount = User::role('job_seeker')->count();
    $employersCount = User::role('employer')->count();
    $adminCount = User::role('admin')->count();

    $latestJobs = Job::latest()->take(6)->get(); // Get 6 latest jobs

    return view('admin.dashboard', compact(
        'jobSeekersCount', 'employersCount', 'adminCount', 'latestJobs'
    ));
    
}

public function show()
{
    $jobs = Job::latest()->take(20)->get(); 
    return view('admin.dashboard', compact('jobs'));
}

public function recommendMe()
{
    $user = Auth::user();

    // Example logic: match jobs based on skills or experience
    $recommendedJobs = Job::where(function ($query) use ($user) {
        foreach (explode(',', $user->skills) as $skill) {
            $query->orWhere('requirements', 'LIKE', '%' . trim($skill) . '%');
        }
    })->orderBy('created_at', 'desc')->take(6)->get();

    return view('recommend-me', compact('recommendedJobs'));
}

}
