<?php

namespace App\Http\Controllers;
use App\Models\Job;

use Illuminate\Http\Request;

class BrowseJobController extends Controller
{
    public function showjob(){
        $jobs = Job::all();
        return view('job.show', compact('jobs'));
    }
    // public function index() {
    //     $jobs = Job::all();
    //     return view('job.view', compact('jobs'));
    // }
     public function index(Request $request)
{
    $query = Job::query();

    if ($request->filled('title')) {
        $query->where('title', 'like', '%' . $request->title . '%');
    }

    if ($request->filled('company')) {
        $query->where('company', 'like', '%' . $request->company . '%');
    }

    if ($request->filled('location')) {
        $query->where('location', 'like', '%' . $request->location . '%');
    }

    if ($request->filled('type')) {
        $query->where('type', $request->type);
    }

    if ($request->filled('category')) {
        $query->where('category', $request->category);
    }

    if ($request->filled('min_salary')) {
        $query->where('salary', '>=', $request->min_salary);
    }

    if ($request->filled('max_salary')) {
        $query->where('salary', '<=', $request->max_salary);
    }

    if ($request->filled('sort') && $request->sort === 'latest') {
        $query->orderBy('created_at', 'desc');
    } elseif ($request->filled('sort') && $request->sort === 'deadline') {
        $query->orderBy('deadline', 'asc');
    }

    // ✅ FIXED: Use paginate instead of get
    $jobs = $query->paginate(9);

    return view('job.view', compact('jobs'));
}


    //creating jobs
    public function createJob()
    {
        return view('job.post_job');
    }

    // Store the posted job in the database
    public function storeJob(Request $request)
    {
        // Validate the form data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'salary' => 'required|numeric',
            'company' => 'required|string|max:255',
        ]);

        // Create and save the new job
        Job::create([
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'salary' => $request->salary,
            'company' => $request->company,
            'user_id' => auth()->id(),

        ]);

        // Redirect to the browse jobs page with a success message
        return redirect()->route('post.job')->with('success', 'Job posted successfully!');

    }
    public function show($id)
{
    $job = Job::findOrFail($id);
    return view('job.show', compact('job'));
}

public function search(Request $request)
{
    $query = $request->input('query');
    $location = $request->input('location');

    $jobs = Job::query()
        ->when($query, function ($q) use ($query) {
            $q->where('title', 'like', "%{$query}%")
            //   ->orWhere('keyskills', 'like', "%{$query}%")
              ->orWhere('company', 'like', "%{$query}%");
        })
        ->when($location, function ($q) use ($location) {
            $q->where('location', 'like', "%{$location}%");
        })
        ->get();

    return view('job.search-results', compact('jobs'));
}




}
