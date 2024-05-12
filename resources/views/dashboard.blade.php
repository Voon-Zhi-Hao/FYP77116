<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Student Dashboard') }}
            <script src="{{ asset('js/supervisor-application.js') }}"></script>
        </h2>
    </x-slot>

    <!-- Tab links -->
    <div class="tab">
    <button class="tablinks" onclick="showTab(event, 'Software Engineering')">Software Engineering</button>
    <button class="tablinks" onclick="showTab(event, 'Information System')">Information System</button>
    <button class="tablinks" onclick="showTab(event, 'Multimedia Computing')">Multimedia Computing</button>
    <button class="tablinks" onclick="showTab(event, 'Network Computing')">Network Computing</button>
    <button class="tablinks" onclick="showTab(event, 'Computer Science')">Computer Science</button>
    </div>

    <!-- Tab content -->
    <div id="Software Engineering" class="tabcontent">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 text-center font-bold text-3xl">
                        {{ __("Software Engineering") }}
                    </div>
                    <div class="py-12 supervisor-container">
                        <ul class="list-none supervisor-list">
                            @forelse ($supervisorsSE as $supervisor)
                                <li class="supervisor-item">
                                    <div class="supervisor-card">
                                        <div class="supervisor-image">
                                            <img src="{{ asset('profile_pictures/' . $supervisor->image) }}" alt="{{ $supervisor->name }}" class="rounded-full"  onerror="this.src = '<?php echo asset('images/quota.png'); ?>';">
                                            <div class="supervisor-name">
                                                <h3>{{ $supervisor->name }}</h3>
                                            <button class="btn btn-primary">Apply Now</button>
                                            </div>
                                        </div>  
                                        <div class="supervisor-details">
                                            <div class="supervisor-quota">
                                                <div class="quota-container">
                                                    <span>AVAILABLE QUOTA</span>
                                                    <span>{{ $supervisor->quota }}</span>
                                                    <img src= "{{ asset('images/quota.png') }}" alt="Logo" style="width: 20px; height: 20px;">
                                                </div>
                                                <div class="contact-container">
                                                <span class="contact">
                                                    <img src= "https://cdn-icons-png.flaticon.com/512/646/646094.png" alt="Logo" style="width: 20px; height: 20px;">
                                                    <img src= "https://cdn-icons-png.flaticon.com/512/15/15874.png" alt="Logo" style="width: 20px; height: 20px;">
                                                </span>
                                                <span class="contact">
                                                    <a href="mailto:{{ $supervisor->email }}" alt="Logo" style="margin-left:0.3rem;">{{ $supervisor->email }}</a>
                                                    {{ $supervisor->phone }}   
                                                </span>
                                                </div>
                                            </div>
                                            <h4>Description</h4>
                                            <div class="supervisor-description-container">
                                                <p>{{ $supervisor->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @empty
                                <li>No supervisors found for Software Engineering program.</li>
                            @endforelse
                        </ul>
                    </div>

                </div>
            </div>
        </div>
  </div>

  <div id="Information System" class="tabcontent">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-center font-bold text-3xl">
                    {{ __("Information System") }}
                </div>
                <div class="py-12 supervisor-container">
                    <ul class="list-none supervisor-list">
                        @forelse ($supervisorsIS as $supervisor)
                            <li class="supervisor-item">
                                <div class="supervisor-card">
                                    <div class="supervisor-image">
                                        <img src="{{ asset('profile_pictures/' . $supervisor->image) }}" alt="{{ $supervisor->name }}" class="rounded-full"  onerror="this.src = '<?php echo asset('images/quota.png'); ?>';">
                                        <div class="supervisor-name">
                                            <h3>{{ $supervisor->name }}</h3>
                                        <button class="btn btn-primary">Apply Now</button>
                                        </div>
                                    </div>
                                    <div class="supervisor-details">
                                        <div class="supervisor-quota">
                                            <div class="quota-container">
                                                <span>AVAILABLE QUOTA</span>
                                                <span>{{ $supervisor->quota }}</span>
                                                <img src= "{{ asset('images/quota.png') }}" alt="Logo" style="width: 20px; height: 20px;">
                                            </div>
                                            <div class="contact-container">
                                            <span class="contact">
                                                <img src= "https://cdn-icons-png.flaticon.com/512/646/646094.png" alt="Logo" style="width: 20px; height: 20px;">
                                                <img src= "https://cdn-icons-png.flaticon.com/512/15/15874.png" alt="Logo" style="width: 20px; height: 20px;">
                                            </span>
                                            <span class="contact">
                                                <a href="mailto:{{ $supervisor->email }}" alt="Logo" style="margin-left:0.3rem;">{{ $supervisor->email }}</a>
                                                {{ $supervisor->phone }}   
                                             </span>
                                            </div>
                                        </div>
                                        <h4>Description</h4>
                                        <div class="supervisor-description-container">
                                            <p>{{ $supervisor->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @empty
                            <li>No supervisors found for Software Engineering program.</li>
                        @endforelse
                    </ul>
                </div>

            </div>
        </div>
    </div>
  </div>

  <div id="Multimedia Computing" class="tabcontent">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-center font-bold text-3xl">
                    {{ __("Multimedia Computing") }}
                </div>
                <div class="py-12 supervisor-container">
                    <ul class="list-none supervisor-list">
                        @forelse ($supervisorsMC as $supervisor)
                            <li class="supervisor-item">
                                <div class="supervisor-card">
                                    <div class="supervisor-image">
                                        <img src="{{ asset('profile_pictures/' . $supervisor->image) }}" alt="{{ $supervisor->name }}" class="rounded-full"  onerror="this.src = '<?php echo asset('images/quota.png'); ?>';">
                                        <div class="supervisor-name">
                                            <h3>{{ $supervisor->name }}</h3>
                                        <button class="btn btn-primary">Apply Now</button>
                                        </div>
                                    </div>
                                    <div class="supervisor-details">
                                        <div class="supervisor-quota">
                                            <div class="quota-container">
                                                <span>AVAILABLE QUOTA</span>
                                                <span>{{ $supervisor->quota }}</span>
                                                <img src= "{{ asset('images/quota.png') }}" alt="Logo" style="width: 20px; height: 20px;">
                                            </div>
                                            <div class="contact-container">
                                            <span class="contact">
                                                <img src= "https://cdn-icons-png.flaticon.com/512/646/646094.png" alt="Logo" style="width: 20px; height: 20px;">
                                                <img src= "https://cdn-icons-png.flaticon.com/512/15/15874.png" alt="Logo" style="width: 20px; height: 20px;">
                                            </span>
                                            <span class="contact">
                                                <a href="mailto:{{ $supervisor->email }}" alt="Logo" style="margin-left:0.3rem;">{{ $supervisor->email }}</a>
                                                {{ $supervisor->phone }}   
                                             </span>
                                            </div>
                                        </div>
                                        <h4>Description</h4>
                                        <div class="supervisor-description-container">
                                            <p>{{ $supervisor->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @empty
                            <li>No supervisors found for Software Engineering program.</li>
                        @endforelse
                    </ul>
                </div>

            </div>
        </div>
    </div>
  </div>

  <div id="Network Computing" class="tabcontent">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-center font-bold text-3xl">
                    {{ __("Network Computing") }}
                </div>
                <div class="py-12 supervisor-container">
                    <ul class="list-none supervisor-list">
                        @forelse ($supervisorsNC as $supervisor)
                            <li class="supervisor-item">
                                <div class="supervisor-card">
                                    <div class="supervisor-image">
                                        <img src="{{ asset('profile_pictures/' . $supervisor->image) }}" alt="{{ $supervisor->name }}" class="rounded-full"  onerror="this.src = '<?php echo asset('images/quota.png'); ?>';">
                                        <div class="supervisor-name">
                                            <h3>{{ $supervisor->name }}</h3>
                                        <button class="btn btn-primary">Apply Now</button>
                                        </div>
                                    </div>
                                    <div class="supervisor-details">
                                        <div class="supervisor-quota">
                                            <div class="quota-container">
                                                <span>AVAILABLE QUOTA</span>
                                                <span>{{ $supervisor->quota }}</span>
                                                <img src= "{{ asset('images/quota.png') }}" alt="Logo" style="width: 20px; height: 20px;">
                                            </div>
                                            <div class="contact-container">
                                            <span class="contact">
                                                <img src= "https://cdn-icons-png.flaticon.com/512/646/646094.png" alt="Logo" style="width: 20px; height: 20px;">
                                                <img src= "https://cdn-icons-png.flaticon.com/512/15/15874.png" alt="Logo" style="width: 20px; height: 20px;">
                                            </span>
                                            <span class="contact">
                                                <a href="mailto:{{ $supervisor->email }}" alt="Logo" style="margin-left:0.3rem;">{{ $supervisor->email }}</a>
                                                {{ $supervisor->phone }}   
                                             </span>
                                            </div>
                                        </div>
                                        <h4>Description</h4>
                                        <div class="supervisor-description-container">
                                            <p>{{ $supervisor->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @empty
                            <li>No supervisors found for Software Engineering program.</li>
                        @endforelse
                    </ul>
                </div>

            </div>
        </div>
    </div>
  </div>

  <div id="Computer Science" class="tabcontent">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-center font-bold text-3xl">
                    {{ __("Computer Science") }}
                </div>
                <div class="py-12 supervisor-container">
                    <ul class="list-none supervisor-list">
                        @forelse ($supervisorsCS as $supervisor)
                            <li class="supervisor-item">
                                <div class="supervisor-card">
                                    <div class="supervisor-image">
                                        <img src="{{ asset('profile_pictures/' . $supervisor->image) }}" alt="{{ $supervisor->name }}" class="rounded-full"  onerror="this.src = '<?php echo asset('images/quota.png'); ?>';">
                                        <div class="supervisor-name">
                                            <h3>{{ $supervisor->name }}</h3>
                                        <button class="btn btn-primary">Apply Now</button>
                                        </div>
                                    </div>
                                    <div class="supervisor-details">
                                        <div class="supervisor-quota">
                                            <div class="quota-container">
                                                <span>AVAILABLE QUOTA</span>
                                                <span>{{ $supervisor->quota }}</span>
                                                <img src= "{{ asset('images/quota.png') }}" alt="Logo" style="width: 20px; height: 20px;">
                                            </div>
                                            <div class="contact-container">
                                            <span class="contact">
                                                <img src= "https://cdn-icons-png.flaticon.com/512/646/646094.png" alt="Logo" style="width: 20px; height: 20px;">
                                                <img src= "https://cdn-icons-png.flaticon.com/512/15/15874.png" alt="Logo" style="width: 20px; height: 20px;">
                                            </span>
                                            <span class="contact">
                                                <a href="mailto:{{ $supervisor->email }}" alt="Logo" style="margin-left:0.3rem;">{{ $supervisor->email }}</a>
                                                {{ $supervisor->phone }}   
                                             </span>
                                            </div>
                                        </div>
                                        <h4>Description</h4>
                                        <div class="supervisor-description-container">
                                            <p>{{ $supervisor->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @empty
                            <li>No supervisors found for Software Engineering program.</li>
                        @endforelse
                    </ul>
                </div>

            </div>
        </div>
    </div>
  </div>


</x-app-layout>


