<?php

use App\Models\Application;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

$supervisor = Auth::user();
?>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Application') }}
            <script src="{{ asset('js/supervisor-application.js') }}"></script>
        </h2>
    </x-slot>

    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
      <div class="flex justify-between p-6 text-gray-900">
        <div class="p-6 text-gray-900 text-center font-bold text-2xl">
          {{ __("My Application") }}
        </div>
      </div>
        <div class="p-6">
          @php
          // Get currently logged-in user
          $user = Auth::user();

          // Check if user has student role (role = 0)
          if ($user->role === 0) {
            $studentName = $user->name; // student name

            // Fetch applications for the student (assuming name is used)
            $applications = Application::where('student_name', $studentName)->get();
          } else {
            $applications = []; // Empty array if not supervisor
          }
          @endphp

          @if (count($applications) > 0)
  <table class="table-auto w-full">
    <thead>
      <tr>
        <th class="px-6 py-3 border-b border-gray-200">Supervisor</th>
        <th class="px-6 py-3 border-b border-gray-200">Programme</th>
        <th class="px-6 py-3 border-b border-gray-200">Description</th>
        <th class="px-6 py-3 border-b border-gray-200">Contact</th>
        <th class="px-6 py-3 border-b border-gray-200">Quota</th>
        <th class="px-6 py-3 border-b border-gray-200">Status</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($applications as $application)
        <tr>
        @php
        $supervisor = User::where('name', $application->supervisor_name)->first(); // Find user by name
        @endphp
          <td class="px-6 py-4 border-b border-gray-200">
            <div class="student-image">
            <img src="{{ asset('profile_pictures/' . $supervisor->image) }}" alt="{{ $supervisor->name }}" class="rounded-full"  onerror="this.src = '<?php echo asset('images/quota.png'); ?>';">
              {{ $application->supervisor_name }}
            </div>
          </td>
          <td class="px-6 py-4 border-b border-gray-200">
            {{ $application->programme }}
          </td>
          <td class="px-6 py-4 border-b border-gray-200">
            {{ $supervisor->description }}
          </td>
          <td class="px-6 py-4 border-b border-gray-200">
            <div class="contact-container" style="background-color: white;">
                <span class="contact">
                    <img src= "https://cdn-icons-png.flaticon.com/512/646/646094.png" alt="Logo" style="width: 20px; height: 20px;">
                    <img src= "https://cdn-icons-png.flaticon.com/512/15/15874.png" alt="Logo" style="width: 20px; height: 20px;">
                </span>
                <span class="contact">
                    <a href="mailto:{{ $supervisor->email }}" alt="Logo" style="margin-left:0.3rem;">{{ $supervisor->email }}</a>
                    {{ $supervisor->phone }}   
                </span>
            </div>
          </td>
          <td class="px-6 py-4 border-b border-gray-200">
            {{ $supervisor->quota }}
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


