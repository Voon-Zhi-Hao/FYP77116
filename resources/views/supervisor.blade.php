<?php

use App\Models\Application;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

$supervisor = Auth::user();
?>

<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Supervisor Dashboard') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
      <div class="flex justify-between p-6 text-gray-900">
        <div class="p-6 text-gray-900 text-center font-bold text-2xl">
          {{ __("Student Applications") }}
        </div>
        <div class="p-6 text-gray-500 text-right font-bold ">
            {{ __('Available Quota:') }} {{ $supervisor->quota }}
          </div>
      </div>
        <div class="p-6">
          @php
          // Get currently logged-in user
          $user = Auth::user();

          // Check if user has supervisor role (role = 1)
          if ($user->role === 1) {
            $supervisorName = $user->name; // Supervisor name

            // Fetch applications for the supervisor (assuming name is used)
            $applications = Application::where('supervisor_name', $supervisorName)->get();
          } else {
            $applications = []; // Empty array if not supervisor
          }
          @endphp

          @if (count($applications) > 0)
  <table class="table-auto w-full">
    <thead>
      <tr>
        <th class="px-6 py-3 border-b border-gray-200">Student</th>
        <th class="px-6 py-3 border-b border-gray-200">Programme</th>
        <th class="px-6 py-3 border-b border-gray-200">Description</th>
        <th class="px-6 py-3 border-b border-gray-200">Status</th>
        <th class="px-6 py-3 border-b border-gray-200">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($applications as $application)
        <tr>
        @php
        $student = User::where('name', $application->student_name)->first(); // Find user by name
        @endphp
          <td class="px-6 py-4 border-b border-gray-200">
            <div class="student-image">
            <img src="{{ asset('profile_pictures/' . $student->image) }}" alt="{{ $student->name }}" class="rounded-full"  onerror="this.src = '<?php echo asset('images/quota.png'); ?>';">
              {{ $application->student_name }}
            </div>
          </td>
          <td class="px-6 py-4 border-b border-gray-200">
            {{ $application->programme }}
          </td>
          <td class="px-6 py-4 border-b border-gray-200">
            {{ $student->description }}
          </td>
          <td class="px-6 py-4 border-b border-gray-200">
            @if ($application->status === 'pending')
              <span class="text-gray-400">Pending</span>
            @elseif ($application->status === 'approved')
              <span class="text-green-500">Approved</span>
            @else
              <span class="text-red-500">Rejected</span>
            @endif
          </td>
          <td class="px-6 py-4 border-b border-gray-200">
            <form method="POST" action="{{ route('supervisor.applications.approve', $application->id) }}">
              @csrf
              <button type="submit" class="btn btn-green approve-btn">Approve</button>
            </form>
            <form method="POST" action="{{ route('supervisor.applications.reject', $application->id) }}">
              @csrf
              <button type="submit" class="btn btn-red reject-btn">Reject</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@else
  <p>No applications found.</p>
@endif

        </div>
      </div>
    </div>
  </div>
</x-app-layout>

