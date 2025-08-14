<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cv;
use PDF;
use Auth;

class CvController extends Controller
{
    public function create(){
        return view('cv.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'address'=>'required',
            'education'=>'nullable',
            'experience'=>'nullable',
            'skills'=>'nullable',
            'template'=>'required|in:template1,template2,template3'
        ]);

        $cv = Cv::updateOrCreate(
            ['user_id'=>Auth::id()],
            ['data'=>json_encode($data), 'template'=>$data['template']]
        );

        return redirect()->route('cv.show');
    }

    public function show(){
        $cv = Cv::where('user_id', Auth::id())->first();
        return view('cv.show', compact('cv'));
    }

    public function download(){
        $cv = Cv::where('user_id', Auth::id())->firstOrFail();
        $data = json_decode($cv->data,true);
        return PDF::loadView('cv.templates.' . $cv->template, compact('data'))
            ->download('cv.pdf');
    }
}
