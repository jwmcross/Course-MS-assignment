@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="h2 mb-0 text-gray-900">Dashboard</h1>
        </div>

        <!-- Content -->
        <div class="row">

            <div class="col-xl-3 col-md-6 mb-5">
                <div class="card border-left-success shadow h-100 py-2">
                    <a href="{{ route('new_student') }}">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text font-weight-bold text-primary text-uppercase mb-1">Students</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Create Student</div>
                            </div>
                            <div class="col-auto"><i class="fas fa-graduation-cap fa-2x"></i></div>
                        </div>
                    </div>
                    </a>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-5">
                <div class="card border-left-success shadow h-100 py-2">
                    <a href="{{ route('new_staff') }}">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text font-weight-bold text-primary text-uppercase mb-1">Staff</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Create Staff</div>
                            </div>
                            <div class="col-auto"><i class="fas fa-user-graduate fa-2x"></i></div>
                        </div>
                    </div>
                    </a>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-5">
                <div class="card border-left-success shadow h-100 py-2">
                    <a href="{{ route('new_course') }}">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text font-weight-bold text-primary text-uppercase mb-1">Course</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Create Course</div>
                            </div>
                            <div class="col-auto"><i class="fas fa-university fa-2x"></i></div>
                        </div>
                    </div>
                    </a>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-5">
                <div class="card border-left-success shadow h-100 py-2">
                    <a href="{{ route('new_module') }}">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text font-weight-bold text-primary text-uppercase mb-1">Module</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Create Module</div>
                            </div>
                            <div class="col-auto"><i class="fas fa-book fa-2x"></i></div>
                        </div>
                    </div>
                    </a>
                </div>
            </div>

        </div>

        <div class="row">            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Student Records</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Dropdown Header:</div>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-pie pt-4 pb-2">
                            <canvas id="myPieChart"></canvas>
                        </div>
                        <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Provisional
                    </span>
                            <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Enrolled
                    </span>
                            <span class="mr-2">
                      <i class="fas fa-circle text-info"></i> Withdrawn
                    </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page_plugins')
    <!-- Page level plugins -->
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>
@endsection

