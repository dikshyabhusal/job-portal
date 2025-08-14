<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Category;
use App\Models\Blog;
use Illuminate\Http\Request;

class GuestJobController extends Controller
{
    public function index()
{
    $topJobs = Job::latest()->take(6)->get();
    $hotJobs = Job::inRandomOrder()->take(6)->get();
    $categories = Category::withCount('jobs')->get();

    return view('guest_jobs', compact('topJobs', 'hotJobs', 'categories'));
}


    public function search(Request $request)
    {
        $query = $request->input('query');

        $jobs = Job::where('title', 'like', "%$query%")
                    ->orWhere('company', 'like', "%$query%")
                    ->orWhere('skills', 'like', "%$query%")
                    ->latest()
                    ->paginate(12);

        return view('guest_jobs_search', compact('jobs', 'query'));
    }

    public function show($id)
    {
        $job = Job::findOrFail($id);
        return view('guest_jobs_show', compact('job'));
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $jobs = $category->jobs()->latest()->paginate(12);
        return view('guest_jobs_category', compact('category', 'jobs'));
    }
}
