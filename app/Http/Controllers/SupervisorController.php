<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Application;

class SupervisorController extends Controller
{
    public function apply(Request $request)
    {
        $supervisorName = $request->input('supervisor_name');
        $studentName = $request->input('student_name');
        $program = $request->input('program');
        $phone = $request->input('phone');
        $email = $request->input('email');
        // Validate and process supervisor ID
        $supervisor = User::where('name', $supervisorName)->first();

        if ($supervisor) {
            // Logic to create an application record
            $application = new Application([
                'supervisor_name' => $supervisorName,
                'student_name' => $studentName,
                'programme' => $program,
                'phone' => $phone,
                'email' => $email,
            ]);

            $application->save();

            return response()->json(['message' => 'Success']);
        } else {
            return response()->json(['message' => 'Invalid supervisor'], 400);
        }
    }

    public function approveApplication(Request $request, $applicationId)
    {
        $application = Application::find($applicationId);
        $supervisor = auth()->user(); // Assuming supervisor identified by logged-in user

        if ($supervisor->role === 1) { // Assuming role is stored as string "supervisor"
            $application->update(['status' => 'approved']);

            $supervisor->updateQuota(-1); // Update quota using model method

            // ... redirect or flash message ...

            return redirect()->route('index');
        } else {
            // Handle scenario where user is not a supervisor
            return abort(403, 'Unauthorized'); // Example: return unauthorized response
        }
    }

    public function rejectApplication(Request $request, $applicationId)
    {
        $application = Application::find($applicationId);
        $supervisor = auth()->user(); // Assuming supervisor identified by logged-in user

        if ($supervisor->role === 1) { // Assuming role is stored as string "supervisor"
            $application->update(['status' => 'rejected']);

            $supervisor->updateQuota(1); // Update quota using model method

            // ... redirect or flash message ...

            return redirect()->route('index');
        } else {
            // Handle scenario where user is not a supervisor
            return abort(403, 'Unauthorized'); // Example: return unauthorized response
        }
    }
}
