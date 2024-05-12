@props(['supervisors'])

@forelse ($supervisors as $supervisor)
<li>{{ $supervisor->name }} - {{ $supervisor->email }} ({{ $supervisor->phone }})</li>
@empty
<li>No supervisors found for Software Engineering program.</li>
@endforelse
