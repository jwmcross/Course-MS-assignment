@extends('layouts.app')


@section('content')
    <div class="container-fluid">
        <h1 class="h1">Course Information</h1>
        <div class="card shadow">
            <h2 class="card-header">
                Course - {{ $course->course_title }}
            </h2>
            <div class="card-body">

                <!-- Personal Info Card -->
                <div class="card mb-3 shadow">
                    <h5 class="card-header">General Information</h5>
                    <div class="card-body">
                        <div class="row mb-2">
                            <dt class="col-2">Course Code</dt>
                            <dd class="col-6">{{ $course->course_code }}</dd>
                        </div>
                        <div class="row mb-2">
                            <dt class="col-2">Course Title</dt>
                            <dd class="col-6">{{ $course->course_title }}</dd>
                        </div>
                        <div class="row mb-2">
                            <dt class="col-2">Award Type</dt>
                            <dd class="col-4">{{ $course->award_type.'. '.$course->awardType() }}</dd>
                            <dt class="col-auto">Award Level</dt>
                            <dd class="col-4">{{ $course->award_level }}</dd>
                        </div>

                        <div class="row mb-2">
                            <dt class="col-2">Course Faculty</dt>
                            <dd class="col-6">{{ $course->courseFaculty() }}</dd>
                        </div>

                        <div class="row mb-2">
                            <dt class="col-2">Course Leader</dt>
                            <dd class="col-6">{{ $course->courseLeader() ?? 'None Assigned' }}</dd>
                        </div>
                    </div>
                </div>

                <!-- Modules Card -->
                <div class="card my-3 shadow">
                    <h5 class="card-header">
                        Modules
                    </h5>
                    <div class="card-body p-2">

                        <h5 class="card-title font-weight-bold text-primary col-12 mt-2">Year One Modules</h5>
                        @forelse($course->yearOneModules() as $module)
                            <div class="row m-3">
                                <div class="col-3">
                                    <!--<h5 class="h5 font-weight-bold text-primary">Year One Modules</h5>-->
                                    <div class="row bg">
                                        <dt class="col-auto">Module Code</dt>
                                        <dd class="col-auto">{{ $module->module_code }}</dd>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <!--<h5 class="h5 font-weight-bold text-primary">Year One Modules</h5>-->
                                    <div class="row">
                                        <dt class="col-auto">Module Title</dt>
                                        <dd class="col-auto">{{ $module->module_title }}</dd>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <!--<h5 class="h5 font-weight-bold text-primary">Year One Modules</h5>-->
                                    <div class="row">
                                        <dt class="col-auto">Module Points</dt>
                                        <dd class="col-auto">{{ $module->points }}</dd>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="row m-3">
                                <div class="col text">No Modules Assigned</div>
                            </div>
                        @endforelse
                        <hr>

                        <h5 class="card-title font-weight-bold text-primary col-12">Year Two Modules</h5>
                        @forelse($course->yearTwoModules() as $module)
                            <div class="row m-3">
                                <div class="col-3">
                                    <!--<h5 class="h5 font-weight-bold text-primary">Year One Modules</h5>-->
                                    <div class="row bg">
                                        <dt class="col-auto">Module Code</dt>
                                        <dd class="col-auto">{{ $module->module_code }}</dd>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <!--<h5 class="h5 font-weight-bold text-primary">Year One Modules</h5>-->
                                    <div class="row">
                                        <dt class="col-auto">Module Title</dt>
                                        <dd class="col-auto">{{ $module->module_title }}</dd>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <!--<h5 class="h5 font-weight-bold text-primary">Year One Modules</h5>-->
                                    <div class="row">
                                        <dt class="col-auto">Module Points</dt>
                                        <dd class="col-auto">{{ $module->points }}</dd>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="row m-3">
                                <div class="col text">No Modules Assigned</div>
                            </div>
                        @endforelse
                        <hr>
                        <h5 class="card-title font-weight-bold text-primary col-12">Year Three Modules</h5>
                        @forelse($course->yearThreeModules() as $module)
                            <div class="row m-3">
                                <div class="col-3">
                                    <!--<h5 class="h5 font-weight-bold text-primary">Year One Modules</h5>-->
                                    <div class="row bg">
                                        <dt class="col-auto">Module Code</dt>
                                        <dd class="col-auto">{{ $module->module_code }}</dd>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <!--<h5 class="h5 font-weight-bold text-primary">Year One Modules</h5>-->
                                    <div class="row">
                                        <dt class="col-auto">Module Title</dt>
                                        <dd class="col-auto">{{ $module->module_title }}</dd>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <!--<h5 class="h5 font-weight-bold text-primary">Year One Modules</h5>-->
                                    <div class="row">
                                        <dt class="col-auto">Module Points</dt>
                                        <dd class="col-auto">{{ $module->points }}</dd>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="row m-3">
                                <div class="col text">No Modules Assigned</div>
                            </div>
                        @endforelse
                    </div><!-- End of modules card body -->
                </div><!-- Modules card body -->

                <div class="card mb-3 shadow">
                    <h5 class="card-header">Miscellaneous Information</h5>
                    <div class="card-body">
                        <div class="row mb-2">
                            <dt class="col-auto">Module Created On</dt>
                            <dd class="col-3">{{ date_format(date_create($course->created_at),'d-M-Y') }}</dd>
                            <dt class="col-auto">Last Updated</dt>
                            <dd class="col-3">{{ date_format(date_create($course->updated_at),'d-M-Y') }}</dd>
                        </div>
                    </div>
                </div>

            </div><!-- End of high level card body -->
        </div><!-- End of high level card -->
    </div><!-- End Content Container -->


@endsection
