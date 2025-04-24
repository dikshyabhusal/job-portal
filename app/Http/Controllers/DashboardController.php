<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Job;

class DashboardController extends Controller
{
    public function index()
{
    $jobs = Job::latest()->take(6)->get(); // Get 6 latest jobs
    return view('dashboard', compact('jobs'));
}

public function show()
{
    $jobs = Job::latest()->take(20)->get(); 
    return view('dashboard', compact('jobs'));
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
