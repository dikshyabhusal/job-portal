<?php

namespace App\Http\Controllers;

use App\Models\TrainingSession;
use App\Models\TrainingApplication;
use Illuminate\Http\Request;
use PDF; // for token download
use Auth;
use Carbon\Carbon;

class TrainingController extends Controller
{
    public function list()
    {
        $sessions = TrainingSession::orderBy('start_date')->get();
        return view('trainings.list', compact('sessions'));
    }

    public function showForm($id)
    {
        $session = TrainingSession::findOrFail($id);
        $deadline = Carbon::parse($session->start_date)->subDays(15);

        if (now()->gt($deadline)) {
            return back()->with('error', 'Enrollment closed for this session.');
        }

        return view('trainings.form', compact('session'));
    }

    public function submitForm(Request $request, $id)
    {
        $session = TrainingSession::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $application = TrainingApplication::create([
            'user_id' => auth()->id(),
            'training_session_id' => $session->id,
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'time_slot' => $request->time_slot,
        ]);

        return redirect()->route('trainings.payment', $application->id);
    }

    public function showPayment($id)
    {
        $application = TrainingApplication::with('session')->findOrFail($id);
        return view('trainings.payment', compact('application'));
    }

    public function processPayment($id)
    {
        $application = TrainingApplication::findOrFail($id);
        $application->status = 'paid';
        $application->save();

        return redirect()->route('trainings.token', $application->id)->with('success', 'Payment successful!');
    }

    public function downloadToken($id)
    {
        $application = TrainingApplication::with('session')->findOrFail($id);
        $pdf = PDF::loadView('trainings.token', compact('application'));
        return $pdf->download('training-token-' . $application->id . '.pdf');
    }
}
