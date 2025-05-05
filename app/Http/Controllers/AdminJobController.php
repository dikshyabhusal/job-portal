<?php

namespace App\Http\Controllers;
use App\Models\Job;

use Illuminate\Http\Request;

class AdminJobController extends Controller
{
    public function showjob(){
        $jobs = Job::all();
        return view('admin.show', compact('jobs'));
    }
    public function index() {
        $jobs = Job::all();
        return view('admin.view', compact('jobs'));
    }

    //creating jobs
    public function createJob()
    {
        return view('admin.post_job');
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
    return view('admin.show', compact('job'));
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

    return view('admin.search-results', compact('jobs'));
}




}
