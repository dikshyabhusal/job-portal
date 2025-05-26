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

public function recommendMe(Request $request)
{
    $query = Job::query();

    // Filter based on user input
    if ($request->filled('title')) {
        $query->where('title', 'LIKE', '%' . $request->title . '%');
    }

    if ($request->filled('location')) {
        $query->where('location', 'LIKE', '%' . $request->location . '%');
    }

    if ($request->filled('skills')) {
        $skills = explode(',', $request->skills);
        $query->where(function ($q) use ($skills) {
            foreach ($skills as $skill) {
                $q->orWhere('requirements', 'LIKE', '%' . trim($skill) . '%');
            }
        });
    }

    if ($request->filled('experience')) {
        $query->where('experience_required', '<=', (int) $request->experience);
    }

    // Sort by latest
    $recommendedJobs = $query->orderBy('created_at', 'desc')->take(6)->get();

    return view('recommend-me', compact('recommendedJobs'));
}


}
