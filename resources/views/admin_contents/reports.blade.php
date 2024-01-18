@include('sidebars.admin_sidebar')
<x-app-layout>
    @include('admin_top_navbar.admin_top_navbar')
    @include('sidebars.admin_sidebar')
    <div class="sm:ml-64">
        <div class="py-4 bg-red-800">
            <div class="container mx-auto">
                <!-- 2 columns on small screens, 3 columns on medium screens, 4 columns on large screens -->
                <div class="grid grid-cols-1  p-5 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4 px-8">
                    <!-- Column 1 -->
                    <div class="flex p-6 bg-white shadow rounded-lg hover:shadow-md items-center">
                        <div class="mr-4 flex items-center text-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path
                                    d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-gray-700 text-xl font-semibold">Total Applications</p>
                            <p class="text-gray-500 text-sm">Since today</p>
                        </div>
                        <div class="ml-auto flex items-center">
                            <p class="text-4xl font-bold text-red-500">{{ $applicationsTotalCount }}</p>
                        </div>
                    </div>

                    <!-- Column 2 -->
                    <div class="flex p-6 bg-white shadow rounded-lg hover:shadow-md items-center">
                        <div class="mr-4 flex items-center text-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-6 h-6">
                                <path
                                    d="M19.006 3.705a.75.75 0 00-.512-1.41L6 6.838V3a.75.75 0 00-.75-.75h-1.5A.75.75 0 003 3v4.93l-1.006.365a.75.75 0 00.512 1.41l16.5-6z" />
                                <path fill-rule="evenodd"
                                    d="M3.019 11.115L18 5.667V9.09l4.006 1.456a.75.75 0 11-.512 1.41l-.494-.18v8.475h.75a.75.75 0 010 1.5H2.25a.75.75 0 010-1.5H3v-9.129l.019-.006zM18 20.25v-9.565l1.5.545v9.02H18zm-9-6a.75.75 0 00-.75.75v4.5c0 .414.336.75.75.75h3a.75.75 0 00.75-.75V15a.75.75 0 00-.75-.75H9z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-gray-700 text-xl font-semibold">All Users</p>
                            <p class="text-gray-500 text-sm">Since today</p>
                        </div>
                        <div class="ml-auto flex items-center">
                            <p class="text-4xl font-bold text-red-500">{{ $totalUsers }}</p>
                        </div>
                    </div>

                    <!-- Column 3 -->
                    <div class="flex p-6 bg-white shadow rounded-lg hover:shadow-md items-center">
                        <div class="mr-4 flex items-center text-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-6 h-6">
                                <path
                                    d="M11.25 5.337c0-.355-.186-.676-.401-.959a1.647 1.647 0 01-.349-1.003c0-1.036 1.007-1.875 2.25-1.875S15 2.34 15 3.375c0 .369-.128.713-.349 1.003-.215.283-.401.604-.401.959 0 .332.278.598.61.578 1.91-.114 3.79-.342 5.632-.676a.75.75 0 01.878.645 49.17 49.17 0 01.376 5.452.657.657 0 01-.66.664c-.354 0-.675-.186-.958-.401a1.647 1.647 0 00-1.003-.349c-1.035 0-1.875 1.007-1.875 2.25s.84 2.25 1.875 2.25c.369 0 .713-.128 1.003-.349.283-.215.604-.401.959-.401.31 0 .557.262.534.571a48.774 48.774 0 01-.595 4.845.75.75 0 01-.61.61c-1.82.317-3.673.533-5.555.642a.58.58 0 01-.611-.581c0-.355.186-.676.401-.959.221-.29.349-.634.349-1.003 0-1.035-1.007-1.875-2.25-1.875s-2.25.84-2.25 1.875c0 .369.128.713.349 1.003.215.283.401.604.401.959a.641.641 0 01-.658.643 49.118 49.118 0 01-4.708-.36.75.75 0 01-.645-.878c.293-1.614.504-3.257.629-4.924A.53.53 0 005.337 15c-.355 0-.676.186-.959.401-.29.221-.634.349-1.003.349-1.036 0-1.875-1.007-1.875-2.25s.84-2.25 1.875-2.25c.369 0 .713.128 1.003.349.283.215.604.401.959.401a.656.656 0 00.659-.663 47.703 47.703 0 00-.31-4.82.75.75 0 01.83-.832c1.343.155 2.703.254 4.077.294a.64.64 0 00.657-.642z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-gray-700 text-xl font-semibold">Total Adopted Pets</p>
                            <p class="text-gray-500 text-sm">Since this month</p>
                        </div>
                        <div class="ml-auto flex items-center">
                            <p class="text-4xl font-bold text-red-500">{{ $totalAdopted }}</p>
                        </div>
                    </div>


                    <!-- Add more columns as needed -->

                </div>
            </div>
        </div>
    </div>

    <section class="sm:ml-64 mb-5 dark:bg-gray-900 p-2 antialiased">
        <div class = "py-2">
            <div class = "container mx-auto px-10">
                <div class = "grid grid-cols-1 lg:grid-cols-3 gap-4">
                    <div class = "bg-white rounded-lg shadow-lg p-3">
                        <h1 class = " text-lg text-center font-bold">Total Adoptions based by Pet Type</h1>
                        {{-- <a href="{{route('export_pet_type')}}">download</a> --}}
                        <div>
                            <canvas id="petAdoptionChart"></canvas>
                        </div>
                    </div>
                    <script>
                        var ctx = document.getElementById('petAdoptionChart').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'pie',
                            data: {
                                labels: ['Dogs', 'Cats'],
                                datasets: [{
                                    data: [{{ $dogCount }}, {{ $catCount }}],
                                    backgroundColor: ['rgba(255, 0, 0, 0.45)', 'rgba(253, 255, 190, 1)'],
                                    borderColor: ['rgba(255, 0, 0, 0.75)', 'rgba(249, 255, 0, 0.75)'],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                legend: {
                                    position: 'top'
                                }
                            }
                        });
                    </script>
                    <div class = "bg-white rounded-lg shadow-lg p-3">
                        <h1 class = " text-lg text-center font-bold">Total Adoptions based by Pet Breed</h1>
                        <div>
                            <canvas id="petBreedChart"></canvas>
                        </div>
                    </div>
                    <script>
                        var ctx = document.getElementById('petBreedChart').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'pie',
                            data: {
                                labels: {!! $breeds->toJson() !!},
                                datasets: [{
                                    data: {!! $counts->toJson() !!},
                                    backgroundColor: [
                                        'rgba(255, 0, 0, 0.45)',
                                        'rgba(253, 255, 190, 1)',
                                        // Add more colors as needed
                                    ],
                                    borderColor: [
                                        'rgba(255, 0, 0, 0.75)',
                                        'rgba(249, 255, 0, 0.75)',
                                        // Add more colors as needed
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                legend: {
                                    position: 'top'
                                },
                                title: {
                                    display: true,
                                    text: 'Pet Breed Distribution',
                                    fontSize: 16
                                }
                            }
                        });
                    </script>
                    <div class = "bg-white rounded-lg shadow-lg p-3">
                        <h1 class = " text-lg text-center font-bold">Total Adoptions based by Age</h1>
                        <div>
                            <canvas id="petAgeChart"></canvas>
                        </div>
                        <script>
                            var ctx = document.getElementById('petAgeChart').getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    labels: {!! $ageRanges->toJson() !!},
                                    datasets: [{
                                        data: {!! $count->toJson() !!},
                                        backgroundColor: [
                                            'rgba(255, 0, 0, 0.45)',
                                            'rgba(253, 255, 190, 1)',
                                            // Add more colors as needed
                                        ],
                                        borderColor: [
                                            'rgba(255, 0, 0, 0.75)',
                                            'rgba(249, 255, 0, 0.75)',
                                            // Add more colors as needed
                                        ],
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    responsive: true,
                                    maintainAspectRatio: false,
                                    legend: {
                                        position: 'top'
                                    },
                                    title: {
                                        display: true,
                                        text: 'Pet Age Distribution',
                                        fontSize: 16
                                    }
                                }
                            });
                        </script>
                    </div>
                    <div class = "bg-white rounded-lg shadow-lg p-3">
                        <h1 class = " text-lg text-center font-bold">Total Adoptions based by Gender</h1>
                        <div>
                            <canvas id="petGenderChart"></canvas>
                        </div>
                        <script>
                            var ctx = document.getElementById('petGenderChart').getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    labels: {!! $genders->toJson() !!},
                                    datasets: [{
                                        data: {!! $gendercounts->toJson() !!},
                                        backgroundColor: ['rgba(255, 0, 0, 0.45)', 'rgba(0, 0, 255, 0.45)'], // Female, Male
                                        borderColor: ['rgba(255, 0, 0, 0.75)', 'rgba(0, 0, 255, 0.75)'],
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    responsive: true,
                                    maintainAspectRatio: false,
                                    legend: {
                                        position: 'top'
                                    },
                                    title: {
                                        display: true,
                                        text: 'Pet Gender Distribution',
                                        fontSize: 16
                                    }
                                }
                            });
                        </script>
                    </div>
                    <div class = "bg-white rounded-lg shadow-lg p-3">
                        <h1 class = " text-lg text-center font-bold">Total Adoptions based by Size</h1>
                        <div>
                            <canvas id="petSizeChart"></canvas>
                        </div>
                        <script>
                            var ctx = document.getElementById('petSizeChart').getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    labels: {!! $sizes->toJson() !!},
                                    datasets: [{
                                        data: {!! $sizecounts->toJson() !!},
                                        backgroundColor: ['rgba(255, 0, 0, 0.45)', 'rgba(0, 255, 0, 0.45)',
                                            'rgba(0, 0, 255, 0.45)'
                                        ], // Small, Medium, Large
                                        borderColor: ['rgba(255, 0, 0, 0.75)', 'rgba(0, 255, 0, 0.75)',
                                            'rgba(0, 0, 255, 0.75)'
                                        ],
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    responsive: true,
                                    maintainAspectRatio: false,
                                    legend: {
                                        position: 'top'
                                    },
                                    title: {
                                        display: true,
                                        text: 'Pet Size Distribution',
                                        fontSize: 16
                                    }
                                }
                            });
                        </script>

                    </div>
                    <div class = "bg-white rounded-lg shadow-lg p-3">
                        <h1 class = " text-lg text-center font-bold">Total Adoptions based by Behavior</h1>

                        <div>
                            <canvas id="petBehaviorChart"></canvas>
                        </div>

                        <script>
                            var ctx = document.getElementById('petBehaviorChart').getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    labels: {!! $behaviors->toJson() !!},
                                    datasets: [{
                                        data: {!! $countss->toJson() !!},
                                        backgroundColor: [
                                            'rgba(255, 99, 132, 0.7)',
                                            'rgba(54, 162, 235, 0.7)',
                                            'rgba(255, 206, 86, 0.7)',
                                            'rgba(75, 192, 192, 0.7)',
                                            'rgba(153, 102, 255, 0.7)',
                                            // Add more colors as needed
                                        ],
                                        borderColor: [
                                            'rgba(255, 99, 132, 1)',
                                            'rgba(54, 162, 235, 1)',
                                            'rgba(255, 206, 86, 1)',
                                            'rgba(75, 192, 192, 1)',
                                            'rgba(153, 102, 255, 1)',
                                            // Add more colors as needed
                                        ],
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    responsive: true,
                                    maintainAspectRatio: false,
                                    legend: {
                                        position: 'top'
                                    },
                                    title: {
                                        display: true,
                                        text: 'Pet Behavior Distribution',
                                        fontSize: 16
                                    }
                                }
                            });
                        </script>

                    </div>
                </div>
            </div>
        </div>
        <div class = "py-2">
            <div class = "grid grid-cols-1 lg:grid-cols-3 gap-4 px-10">
                <div class="bg-white rounded-lg shadow-lg lg:overflow-x-hidden overflow-x-auto lg:col-span-2 p-3">
                    <canvas id="adoptedPetsChart"></canvas>
                </div>
                <script>
                    var AdoptedData = <?php echo json_encode($AdoptedData); ?>;
                    var labels = Object.keys(AdoptedData);
                    var data = Object.values(AdoptedData);

                    var ctx = document.getElementById('adoptedPetsChart').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Adopted Pets per Month for this Current Year',
                                data: data,
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    precision: 0,
                                    callback: function(value) {
                                        return Math.round(value);
                                    }
                                }
                            }
                        }
                    });
                </script>
                <div class = "bg-white rounded-lg shadow-lg p-3">
                    <div>
                        <canvas id="adoptedPetsComparisonChart"></canvas>
                    </div>
                    <script>
                        var currentYearCount = <?php echo $currentYearCount; ?>;
                        var previousYearCount = <?php echo $previousYearCount; ?>;

                        var ctx = document.getElementById('adoptedPetsComparisonChart').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: ['Current Year', 'Previous Year'],
                                datasets: [{
                                    label: 'Adopted Pets',
                                    data: [currentYearCount, previousYearCount],
                                    backgroundColor: ['rgba(75, 192, 192, 0.2)', 'rgba(255, 0, 0, 0.2)'],
                                    borderColor: ['rgba(75, 192, 192, 1)', 'rgba(255, 0, 0, 1)'],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                scales: {
                                    y: {
                                        beginAtZero: true,
                                        precision: 0,
                                        callback: function(value) {
                                            return Math.round(value);
                                        }
                                    }
                                }
                            }
                        });
                    </script>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
