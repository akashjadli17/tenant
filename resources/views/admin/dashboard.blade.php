@extends('layouts.adminmaster')

@section('title', 'Tenant Aesthetic Pvt Ltd')

@section('content')



    <!-- Start right Content here -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xl-4">
                        <div class="card overflow-hidden">
                            <div class="bg-primary-subtle">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-3">
                                            <h5 class="text-primary">Welcome Back !</h5>
                                            <p>Tenant Dashboard</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="{{ asset('assets/dashboard/images/profile-img.png') }}" alt=""
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <img src="{{ asset('assets/dashboard/images/users/avatar-1.jpg') }}"
                                                alt="" class="img-thumbnail rounded-circle">
                                        </div>
                                        <h5 class="font-size-15 text-truncate">Henry Price</h5>
                                        {{-- <p class="text-muted mb-0 text-truncate">UI/UX Designer</p> --}}
                                    </div>

                                    <div class="col-sm-8">
                                        <div class="pt-4">

                                            {{-- <div class="row">
                                                <div class="col-6">
                                                    <h5 class="font-size-15">125</h5>
                                                    <p class="text-muted mb-0">Projects</p>
                                                </div>
                                                <div class="col-6">
                                                    <h5 class="font-size-15">$1245</h5>
                                                    <p class="text-muted mb-0">Revenue</p>
                                                </div>
                                            </div> --}}
                                            <div class="mt-4">
                                                <a href="javascript: void(0);"
                                                    class="btn btn-primary waves-effect waves-light btn-sm">View
                                                    Profile <i class="mdi mdi-arrow-right ms-1"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Monthly Bookings</h4>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="text-muted">This month</p>
                                        <h3>128 Bookings</h3>
                                        <p class="text-muted"><span class="text-success me-2">8% <i
                                                    class="mdi mdi-arrow-up"></i></span> From previous period</p>

                                        <div class="mt-4">
                                            <a href="javascript: void(0);"
                                                class="btn btn-primary waves-effect waves-light btn-sm">
                                                View Details <i class="mdi mdi-arrow-right ms-1"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mt-4 mt-sm-0">
                                            <div id="radialBar-chart" data-colors='["--bs-primary"]' class="apex-charts">
                                                <!-- Chart remains unchanged -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-muted mb-0">Track total number of bookings each month efficiently.</p>
                            </div>
                        </div>



                    </div>
                    <div class="col-xl-8">
                        <div class="row">
                            <!-- Total Services -->
                            <div class="col-md-4">
                                <div class="card mini-stats-wid">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-muted fw-medium">Total Services</p>
                                                <h4 class="mb-0">{{ $totalServices }}</h4>
                                            </div>

                                            <div class="flex-shrink-0 align-self-center">
                                                <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                    <span class="avatar-title">
                                                        <i class="bx bx-copy-alt font-size-24"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Total Customers -->
                            <div class="col-md-4">
                                <div class="card mini-stats-wid">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-muted fw-medium">Total Customers</p>
                                                <h4 class="mb-0">{{ $totalCustomers }}</h4>
                                            </div>

                                            <div class="flex-shrink-0 align-self-center">
                                                <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                    <span class="avatar-title rounded-circle bg-primary">
                                                        <i class="bx bx-user font-size-24"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Total Enquiries -->
                            <div class="col-md-4">
                                <div class="card mini-stats-wid">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-muted fw-medium">Total Enquiries</p>
                                                <h4 class="mb-0">{{ $totalEnquiries }}</h4>
                                            </div>

                                            <div class="flex-shrink-0 align-self-center">
                                                <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                    <span class="avatar-title rounded-circle bg-primary">
                                                        <i class="bx bx-message-square-dots font-size-24"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- end row -->

                        <!-- ApexCharts CDN -->
                        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

                        <!-- Chart Section -->
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex flex-wrap align-items-center justify-content-between">
                                    <h4 class="card-title mb-4">Orders by Category</h4>
                                    <div class="d-flex gap-2 align-items-center">
                                        <!-- Tabs -->
                                        <ul class="nav nav-pills mb-0" id="filter-tabs">
                                            <li class="nav-item">
                                                <a class="nav-link" data-type="week" href="#">Week</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-type="month" href="#">Month</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link active" data-type="year" href="#">Year</a>
                                            </li>
                                        </ul>

                                        <!-- Month Dropdown -->
                                        <select id="month-select" class="form-select form-select-sm d-none ms-2">
                                            <option value="Jan">January</option>
                                            <option value="Feb">February</option>
                                            <option value="Mar">March</option>
                                            <option value="Apr">April</option>
                                            <option value="May">May</option>
                                            <option value="Jun">June</option>
                                            <option value="Jul">July</option>
                                            <option value="Aug">August</option>
                                            <option value="Sep">September</option>
                                            <option value="Oct">October</option>
                                            <option value="Nov">November</option>
                                            <option value="Dec">December</option>
                                        </select>

                                        <!-- Year Dropdown -->
                                        <select id="year-select" class="form-select form-select-sm d-none ms-2">
                                            <option value="2023">2023</option>
                                            <option value="2024" selected>2024</option>
                                            <option value="2025">2025</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Chart -->
                                <div id="orders-by-category-chart" class="apex-charts mt-4"></div>
                            </div>
                        </div>

                        <!-- Script -->
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                const chartEl = document.querySelector("#orders-by-category-chart");
                                const monthSelect = document.querySelector("#month-select");
                                const yearSelect = document.querySelector("#year-select");

                                // Dummy data sets
                                const dataSets = {
                                    week: {
                                        categories: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                                        series: [{
                                                name: 'Skin Concern',
                                                data: [12, 14, 10, 16, 18, 20, 22]
                                            },
                                            {
                                                name: 'Treatment',
                                                data: [10, 11, 9, 13, 15, 17, 19]
                                            },
                                            {
                                                name: 'Combined',
                                                data: [5, 7, 6, 8, 9, 10, 12]
                                            },
                                        ]
                                    },
                                    month: {
                                        Jan: {
                                            categories: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                                            series: [{
                                                    name: 'Skin Concern',
                                                    data: [35, 40, 30, 45]
                                                },
                                                {
                                                    name: 'Treatment',
                                                    data: [20, 25, 18, 22]
                                                },
                                                {
                                                    name: 'Combined',
                                                    data: [10, 12, 8, 14]
                                                },
                                            ]
                                        },
                                        Feb: {
                                            categories: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                                            series: [{
                                                    name: 'Skin Concern',
                                                    data: [30, 38, 28, 40]
                                                },
                                                {
                                                    name: 'Treatment',
                                                    data: [18, 22, 15, 20]
                                                },
                                                {
                                                    name: 'Combined',
                                                    data: [9, 10, 7, 12]
                                                },
                                            ]
                                        },
                                        Mar: {
                                            categories: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                                            series: [{
                                                    name: 'Skin Concern',
                                                    data: [38, 42, 37, 44]
                                                },
                                                {
                                                    name: 'Treatment',
                                                    data: [22, 26, 21, 28]
                                                },
                                                {
                                                    name: 'Combined',
                                                    data: [11, 13, 10, 15]
                                                },
                                            ]
                                        },
                                        Apr: {
                                            categories: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                                            series: [{
                                                    name: 'Skin Concern',
                                                    data: [45, 50, 48, 52]
                                                },
                                                {
                                                    name: 'Treatment',
                                                    data: [25, 30, 28, 31]
                                                },
                                                {
                                                    name: 'Combined',
                                                    data: [13, 14, 12, 16]
                                                },
                                            ]
                                        },
                                        // Add all remaining months here...
                                        May: {
                                            categories: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                                            series: [{
                                                    name: 'Skin Concern',
                                                    data: [50, 55, 60, 62]
                                                },
                                                {
                                                    name: 'Treatment',
                                                    data: [30, 33, 31, 35]
                                                },
                                                {
                                                    name: 'Combined',
                                                    data: [15, 18, 16, 20]
                                                },
                                            ]
                                        },
                                        Jun: {
                                            categories: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                                            series: [{
                                                    name: 'Skin Concern',
                                                    data: [58, 60, 63, 65]
                                                },
                                                {
                                                    name: 'Treatment',
                                                    data: [32, 35, 36, 38]
                                                },
                                                {
                                                    name: 'Combined',
                                                    data: [17, 19, 20, 21]
                                                },
                                            ]
                                        },
                                        Jul: {
                                            categories: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                                            series: [{
                                                    name: 'Skin Concern',
                                                    data: [65, 70, 68, 72]
                                                },
                                                {
                                                    name: 'Treatment',
                                                    data: [38, 40, 39, 42]
                                                },
                                                {
                                                    name: 'Combined',
                                                    data: [19, 21, 20, 23]
                                                },
                                            ]
                                        },
                                        Aug: {
                                            categories: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                                            series: [{
                                                    name: 'Skin Concern',
                                                    data: [68, 72, 70, 75]
                                                },
                                                {
                                                    name: 'Treatment',
                                                    data: [40, 44, 43, 46]
                                                },
                                                {
                                                    name: 'Combined',
                                                    data: [21, 24, 22, 26]
                                                },
                                            ]
                                        },
                                        Sep: {
                                            categories: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                                            series: [{
                                                    name: 'Skin Concern',
                                                    data: [72, 75, 78, 80]
                                                },
                                                {
                                                    name: 'Treatment',
                                                    data: [44, 46, 48, 50]
                                                },
                                                {
                                                    name: 'Combined',
                                                    data: [24, 25, 26, 28]
                                                },
                                            ]
                                        },
                                        Oct: {
                                            categories: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                                            series: [{
                                                    name: 'Skin Concern',
                                                    data: [78, 80, 83, 85]
                                                },
                                                {
                                                    name: 'Treatment',
                                                    data: [46, 49, 50, 53]
                                                },
                                                {
                                                    name: 'Combined',
                                                    data: [25, 27, 28, 30]
                                                },
                                            ]
                                        },
                                        Nov: {
                                            categories: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                                            series: [{
                                                    name: 'Skin Concern',
                                                    data: [82, 84, 88, 90]
                                                },
                                                {
                                                    name: 'Treatment',
                                                    data: [50, 53, 55, 57]
                                                },
                                                {
                                                    name: 'Combined',
                                                    data: [28, 30, 31, 33]
                                                },
                                            ]
                                        },
                                        Dec: {
                                            categories: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                                            series: [{
                                                    name: 'Skin Concern',
                                                    data: [90, 92, 95, 98]
                                                },
                                                {
                                                    name: 'Treatment',
                                                    data: [55, 57, 59, 62]
                                                },
                                                {
                                                    name: 'Combined',
                                                    data: [30, 33, 34, 36]
                                                },
                                            ]
                                        }
                                    },
                                    year: {
                                        2023: {
                                            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct',
                                                'Nov', 'Dec'
                                            ],
                                            series: [{
                                                    name: 'Skin Concern',
                                                    data: [44, 55, 41, 67, 22, 43, 36, 52, 20, 18, 34, 48]
                                                },
                                                {
                                                    name: 'Treatment',
                                                    data: [13, 23, 20, 8, 13, 27, 14, 18, 11, 20, 17, 21]
                                                },
                                                {
                                                    name: 'Combined',
                                                    data: [11, 17, 15, 15, 21, 14, 12, 14, 19, 15, 20, 18]
                                                }
                                            ]
                                        },
                                        2024: {
                                            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct',
                                                'Nov', 'Dec'
                                            ],
                                            series: [{
                                                    name: 'Skin Concern',
                                                    data: [60, 70, 68, 75, 80, 85, 78, 82, 84, 90, 95, 100]
                                                },
                                                {
                                                    name: 'Treatment',
                                                    data: [22, 28, 25, 30, 32, 35, 36, 40, 42, 45, 48, 52]
                                                },
                                                {
                                                    name: 'Combined',
                                                    data: [14, 16, 13, 17, 18, 19, 20, 21, 22, 24, 25, 26]
                                                }
                                            ]
                                        }
                                    }
                                };

                                let currentChart;

                                function renderChart({
                                    categories,
                                    series
                                }) {
                                    if (currentChart) currentChart.destroy();
                                    const options = {
                                        chart: {
                                            type: 'bar',
                                            height: 350,
                                            stacked: true,
                                            toolbar: {
                                                show: false
                                            }
                                        },
                                        plotOptions: {
                                            bar: {
                                                horizontal: false,
                                                columnWidth: '40%',
                                                endingShape: 'rounded'
                                            }
                                        },
                                        dataLabels: {
                                            enabled: false
                                        },
                                        series,
                                        xaxis: {
                                            categories
                                        },
                                        colors: ['#556ee6', '#f1b44c', '#34c38f'],
                                        legend: {
                                            position: 'bottom'
                                        },
                                        fill: {
                                            opacity: 1
                                        },
                                        grid: {
                                            borderColor: '#f1f1f1'
                                        }
                                    };
                                    currentChart = new ApexCharts(chartEl, options);
                                    currentChart.render();
                                }

                                // Initial render (Year - 2024)
                                renderChart(dataSets.year["2024"]);

                                // Tab click handler
                                document.querySelectorAll("#filter-tabs .nav-link").forEach(link => {
                                    link.addEventListener("click", function(e) {
                                        e.preventDefault();
                                        document.querySelectorAll("#filter-tabs .nav-link").forEach(l => l.classList
                                            .remove("active"));
                                        this.classList.add("active");

                                        const type = this.dataset.type;
                                        monthSelect.classList.add("d-none");
                                        yearSelect.classList.add("d-none");

                                        if (type === "week") {
                                            renderChart(dataSets.week);
                                        } else if (type === "month") {
                                            monthSelect.classList.remove("d-none");
                                            renderChart(dataSets.month["Jan"]);
                                        } else if (type === "year") {
                                            yearSelect.classList.remove("d-none");
                                            renderChart(dataSets.year["2024"]);
                                        }
                                    });
                                });

                                // Month change
                                monthSelect.addEventListener("change", function() {
                                    const selected = this.value;
                                    if (dataSets.month[selected]) {
                                        renderChart(dataSets.month[selected]);
                                    }
                                });

                                // Year change
                                yearSelect.addEventListener("change", function() {
                                    const selected = this.value;
                                    if (dataSets.year[selected]) {
                                        renderChart(dataSets.year[selected]);
                                    }
                                });
                            });
                        </script>


                    </div>
                </div>
                <!-- end row -->

                {{-- <div class="row">
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Social Source</h4>
                                <div class="text-center">
                                    <div class="avatar-sm mx-auto mb-4">
                                        <span class="avatar-title rounded-circle bg-primary-subtle font-size-24">
                                            <i class="mdi mdi-facebook text-primary"></i>
                                        </span>
                                    </div>
                                    <p class="font-16 text-muted mb-2"></p>
                                    <h5><a href="javascript: void(0);" class="text-dark">Facebook - <span
                                                class="text-muted font-16">125 sales</span> </a></h5>
                                    <p class="text-muted">Maecenas nec odio et ante tincidunt tempus. Donec vitae
                                        sapien ut libero venenatis faucibus tincidunt.</p>
                                    <a href="javascript: void(0);" class="text-primary font-16">Learn more <i
                                            class="mdi mdi-chevron-right"></i></a>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-4">
                                        <div class="social-source text-center mt-3">
                                            <div class="avatar-xs mx-auto mb-3">
                                                <span class="avatar-title rounded-circle bg-primary font-size-16">
                                                    <i class="mdi mdi-facebook text-white"></i>
                                                </span>
                                            </div>
                                            <h5 class="font-size-15">Facebook</h5>
                                            <p class="text-muted mb-0">125 sales</p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="social-source text-center mt-3">
                                            <div class="avatar-xs mx-auto mb-3">
                                                <span class="avatar-title rounded-circle bg-info font-size-16">
                                                    <i class="mdi mdi-twitter text-white"></i>
                                                </span>
                                            </div>
                                            <h5 class="font-size-15">Twitter</h5>
                                            <p class="text-muted mb-0">112 sales</p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="social-source text-center mt-3">
                                            <div class="avatar-xs mx-auto mb-3">
                                                <span class="avatar-title rounded-circle bg-pink font-size-16">
                                                    <i class="mdi mdi-instagram text-white"></i>
                                                </span>
                                            </div>
                                            <h5 class="font-size-15">Instagram</h5>
                                            <p class="text-muted mb-0">104 sales</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-5">Activity</h4>
                                <ul class="verti-timeline list-unstyled">
                                    <li class="event-list">
                                        <div class="event-timeline-dot">
                                            <i class="bx bx-right-arrow-circle font-size-18"></i>
                                        </div>
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <h5 class="font-size-14">22 Nov <i
                                                        class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ms-2"></i>
                                                </h5>
                                            </div>
                                            <div class="flex-grow-1">
                                                <div>
                                                    Responded to need “Volunteer Activities
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="event-list">
                                        <div class="event-timeline-dot">
                                            <i class="bx bx-right-arrow-circle font-size-18"></i>
                                        </div>
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <h5 class="font-size-14">17 Nov <i
                                                        class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ms-2"></i>
                                                </h5>
                                            </div>
                                            <div class="flex-grow-1">
                                                <div>
                                                    Everyone realizes why a new common language would be
                                                    desirable... <a href="javascript: void(0);">Read more</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="event-list active">
                                        <div class="event-timeline-dot">
                                            <i class="bx bxs-right-arrow-circle font-size-18 bx-fade-right"></i>
                                        </div>
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <h5 class="font-size-14">15 Nov <i
                                                        class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ms-2"></i>
                                                </h5>
                                            </div>
                                            <div class="flex-grow-1">
                                                <div>
                                                    Joined the group “Boardsmanship Forum”
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="event-list">
                                        <div class="event-timeline-dot">
                                            <i class="bx bx-right-arrow-circle font-size-18"></i>
                                        </div>
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <h5 class="font-size-14">12 Nov <i
                                                        class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ms-2"></i>
                                                </h5>
                                            </div>
                                            <div class="flex-grow-1">
                                                <div>
                                                    Responded to need “In-Kind Opportunity”
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <div class="text-center mt-4"><a href="javascript: void(0);"
                                        class="btn btn-primary waves-effect waves-light btn-sm">View More <i
                                            class="mdi mdi-arrow-right ms-1"></i></a></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Top Cities Selling Product</h4>

                                <div class="text-center">
                                    <div class="mb-4">
                                        <i class="bx bx-map-pin text-primary display-4"></i>
                                    </div>
                                    <h3>1,456</h3>
                                    <p>San Francisco</p>
                                </div>

                                <div class="table-responsive mt-4">
                                    <table class="table align-middle table-nowrap">
                                        <tbody>
                                            <tr>
                                                <td style="width: 30%">
                                                    <p class="mb-0">San Francisco</p>
                                                </td>
                                                <td style="width: 25%">
                                                    <h5 class="mb-0">1,456</h5>
                                                </td>
                                                <td>
                                                    <div class="progress bg-transparent progress-sm">
                                                        <div class="progress-bar bg-primary rounded" role="progressbar"
                                                            style="width: 94%" aria-valuenow="94" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class="mb-0">Los Angeles</p>
                                                </td>
                                                <td>
                                                    <h5 class="mb-0">1,123</h5>
                                                </td>
                                                <td>
                                                    <div class="progress bg-transparent progress-sm">
                                                        <div class="progress-bar bg-success rounded" role="progressbar"
                                                            style="width: 82%" aria-valuenow="82" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class="mb-0">San Diego</p>
                                                </td>
                                                <td>
                                                    <h5 class="mb-0">1,026</h5>
                                                </td>
                                                <td>
                                                    <div class="progress bg-transparent progress-sm">
                                                        <div class="progress-bar bg-warning rounded" role="progressbar"
                                                            style="width: 70%" aria-valuenow="70" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- end row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Latest Transaction</h4>
                                <div class="table-responsive">
                                    <table class="table align-middle table-nowrap mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th style="width: 20px;">
                                                    <div class="form-check font-size-16 align-middle">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="transactionCheck01">
                                                        <label class="form-check-label" for="transactionCheck01"></label>
                                                    </div>
                                                </th>
                                                <th class="align-middle">Order ID</th>
                                                <th class="align-middle">Billing Name</th>
                                                <th class="align-middle">Date</th>
                                                <th class="align-middle">Total</th>
                                                <th class="align-middle">Payment Status</th>
                                                <th class="align-middle">Payment Method</th>
                                                <th class="align-middle">View Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="form-check font-size-16"><input class="form-check-input"
                                                            type="checkbox" id="transactionCheck02"></div>
                                                </td>
                                                <td><a href="#" class="text-body fw-bold">#IN3250</a></td>
                                                <td>Rahul Verma</td>
                                                <td>02 Jun, 2025</td>
                                                <td>₹8,000</td>
                                                <td><span
                                                        class="badge badge-pill badge-soft-success font-size-11">Paid</span>
                                                </td>
                                                <td><i class="fab fa-cc-mastercard me-1"></i> Mastercard</td>
                                                <td><button
                                                        class="btn btn-primary btn-sm btn-rounded waves-effect waves-light"
                                                        data-bs-toggle="modal"
                                                        data-bs-target=".transaction-detailModal">View Details</button>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div class="form-check font-size-16"><input class="form-check-input"
                                                            type="checkbox" id="transactionCheck03"></div>
                                                </td>
                                                <td><a href="#" class="text-body fw-bold">#IN3251</a></td>
                                                <td>Priya Singh</td>
                                                <td>08 Jun, 2025</td>
                                                <td>₹7,500</td>
                                                <td><span
                                                        class="badge badge-pill badge-soft-danger font-size-11">Chargeback</span>
                                                </td>
                                                <td><i class="fab fa-cc-visa me-1"></i> Visa</td>
                                                <td><button
                                                        class="btn btn-primary btn-sm btn-rounded waves-effect waves-light"
                                                        data-bs-toggle="modal"
                                                        data-bs-target=".transaction-detailModal">View Details</button>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div class="form-check font-size-16"><input class="form-check-input"
                                                            type="checkbox" id="transactionCheck04"></div>
                                                </td>
                                                <td><a href="#" class="text-body fw-bold">#IN3252</a></td>
                                                <td>Vikram Mehra</td>
                                                <td>14 Jun, 2025</td>
                                                <td>₹6,900</td>
                                                <td><span
                                                        class="badge badge-pill badge-soft-success font-size-11">Paid</span>
                                                </td>
                                                <td><i class="fab fa-cc-paypal me-1"></i> Paypal</td>
                                                <td><button
                                                        class="btn btn-primary btn-sm btn-rounded waves-effect waves-light"
                                                        data-bs-toggle="modal"
                                                        data-bs-target=".transaction-detailModal">View Details</button>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div class="form-check font-size-16"><input class="form-check-input"
                                                            type="checkbox" id="transactionCheck05"></div>
                                                </td>
                                                <td><a href="#" class="text-body fw-bold">#IN3253</a></td>
                                                <td>Meena Rathore</td>
                                                <td>20 Jun, 2025</td>
                                                <td>₹9,200</td>
                                                <td><span
                                                        class="badge badge-pill badge-soft-success font-size-11">Paid</span>
                                                </td>
                                                <td><i class="fab fa-cc-mastercard me-1"></i> Mastercard</td>
                                                <td><button
                                                        class="btn btn-primary btn-sm btn-rounded waves-effect waves-light"
                                                        data-bs-toggle="modal"
                                                        data-bs-target=".transaction-detailModal">View Details</button>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div class="form-check font-size-16"><input class="form-check-input"
                                                            type="checkbox" id="transactionCheck06"></div>
                                                </td>
                                                <td><a href="#" class="text-body fw-bold">#IN3254</a></td>
                                                <td>Rohit Sharma</td>
                                                <td>28 Jun, 2025</td>
                                                <td>₹7,800</td>
                                                <td><span
                                                        class="badge badge-pill badge-soft-warning font-size-11">Refund</span>
                                                </td>
                                                <td><i class="fab fa-cc-visa me-1"></i> Visa</td>
                                                <td><button
                                                        class="btn btn-primary btn-sm btn-rounded waves-effect waves-light"
                                                        data-bs-toggle="modal"
                                                        data-bs-target=".transaction-detailModal">View Details</button>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div class="form-check font-size-16"><input class="form-check-input"
                                                            type="checkbox" id="transactionCheck07"></div>
                                                </td>
                                                <td><a href="#" class="text-body fw-bold">#IN3255</a></td>
                                                <td>Sneha Kapoor</td>
                                                <td>03 Jul, 2025</td>
                                                <td>₹8,600</td>
                                                <td><span
                                                        class="badge badge-pill badge-soft-success font-size-11">Paid</span>
                                                </td>
                                                <td><i class="fab fa-cc-paypal me-1"></i> Paypal</td>
                                                <td><button
                                                        class="btn btn-primary btn-sm btn-rounded waves-effect waves-light"
                                                        data-bs-toggle="modal"
                                                        data-bs-target=".transaction-detailModal">View Details</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- end table-responsive -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- end row -->
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <!-- Transaction Modal -->
        <div class="modal fade transaction-detailModal" tabindex="-1" role="dialog"
            aria-labelledby="transaction-detailModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Order Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="mb-2">Order ID: <span class="text-primary">#IN3250</span></p>
                        <p class="mb-4">Billing Name: <span class="text-primary">Rahul Verma</span></p>

                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col">Image</th>
                                        <th scope="col">Service Name</th>
                                        <th scope="col">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <img src="{{ asset('http://127.0.0.1:8000/storage/uploads/mid_categories/1751960446_686ccb7ef144e.png') }}" alt="Acne"
                                                class="avatar-sm rounded">
                                        </td>
                                        <td>
                                            <h5 class="font-size-14 mb-0">Acne Treatment</h5>
                                            <p class="text-muted mb-0">₹ 2,499 x 1</p>
                                        </td>
                                        <td>₹ 2,499</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="{{ asset('http://127.0.0.1:8000/storage/uploads/mid_categories/1752562436_6875fb0405962.png') }}" alt="Hair Fall"
                                                class="avatar-sm rounded">
                                        </td>
                                        <td>
                                            <h5 class="font-size-14 mb-0">Hair Fall Control</h5>
                                            <p class="text-muted mb-0">₹ 1,799 x 1</p>
                                        </td>
                                        <td>₹ 1,799</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="text-end">
                                            <strong>Sub Total:</strong>
                                        </td>
                                        <td>₹ 4,298</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="text-end">
                                            <strong>Shipping:</strong>
                                        </td>
                                        <td>Free</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="text-end">
                                            <strong>Total:</strong>
                                        </td>
                                        <td><strong>₹ 4,298</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>


        <!-- subscribeModal -->
        {{-- <div class="modal fade" id="subscribeModal" tabindex="-1" aria-labelledby="subscribeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center mb-4">
                            <div class="avatar-md mx-auto mb-4">
                                <div class="avatar-title bg-light rounded-circle text-primary h1">
                                    <i class="mdi mdi-email-open"></i>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-xl-10">
                                    <h4 class="text-primary">Subscribe !</h4>
                                    <p class="text-muted font-size-14 mb-4">Subscribe our newletter and get
                                        notification to stay update.</p>

                                    <div class="input-group bg-light rounded">
                                        <input type="email" class="form-control bg-transparent border-0"
                                            placeholder="Enter Email address" aria-label="Recipient's username"
                                            aria-describedby="button-addon2">

                                        <button class="btn btn-primary" type="button" id="button-addon2">
                                            <i class="bx bxs-paper-plane"></i>
                                        </button>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- end modal -->
    @endsection
