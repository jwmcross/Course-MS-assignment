@extends('layouts.app')


@section('content')
    <div class="container-fluid">
        <h1 class="h1">Module Information</h1>
        <div class="card shadow">
            <h2 class="card-header">
                Module - {{ $module->module_title }}
            </h2>
            <div class="card-body">

                <!-- General Info Card -->
                <div class="card mb-3 shadow">
                    <h5 class="card-header">General Information</h5>
                    <div class="card-body">
                        <div class="row mb-2">
                            <dt class="col-2">Module Code</dt>
                            <dd class="col-6">{{ $module->module_code }}</dd>
                        </div>
                        <div class="row mb-2">
                            <dt class="col-2">Module Title</dt>
                            <dd class="col-6">{{ $module->module_title }}</dd>
                        </div>
                        <div class="row mb-2">
                            <dt class="col-2">Module Points</dt>
                            <dd class="col-4">{{ $module->points }}</dd>
                            <dt class="col-auto">Level</dt>
                            <dd class="col-4">{{ $module->level }}</dd>
                        </div>

                        <div class="row mb-2">
                            <dt class="col-2">Module Department</dt>
                            <dd class="col-6">{{ $module->courseDept() }}</dd>
                        </div>

                        <div class="row mb-2">
                            <dt class="col-2">Module Leader</dt>
                            <dd class="col-6">
                                @forelse($module->moduleLeader() as $leader)
                                    {{ $leader->title.'. '.$leader->firstname.' '.$leader->surname }}
                                @empty
                                    No Leaders Assigned
                                @endforelse
                            </dd>
                        </div>
                    </div>
                </div>

                <!-- Assessment Info Card -->
                <div class="card mb-3 shadow">
                    <h5 class="card-header">Assessment Information</h5>
                    <div class="card-body">
                        <div class="row mb-2">
                            <dt class="col-2">Assessment 1 Weight</dt>
                            <dd class="col-6">{{ $module->assessment1_weight ?? 'N/A' }}</dd>
                        </div>
                        <div class="row mb-2">
                            <dt class="col-2">Assessment 2 Weight</dt>
                            <dd class="col-6">{{ $module->assessment2_weight ?? 'N/A' }}</dd>
                        </div>
                        <div class="row mb-2">
                            <dt class="col-2">Exam Assessment Weight</dt>
                            <dd class="col-6">{{ $module->exam_weight ?? 'N/A' }}</dd>
                        </div>
                    </div>
                </div>

                <!-- Creation Info Card -->
                <div class="card mb-3 shadow">
                    <h5 class="card-header">Miscellaneous Information</h5>
                    <div class="card-body">
                        <div class="row mb-2">
                            <dt class="col-auto">Module Created On</dt>
                            <dd class="col-3">{{ date_format(date_create($module->created_at),'d-M-Y') }}</dd>
                            <dt class="col-auto">Last Updated</dt>
                            <dd class="col-3">{{ date_format(date_create($module->updated_at),'d-M-Y') }}</dd>
                        </div>
                    </div>
                </div>

            </div><!-- End of high level card body -->
        </div><!-- End of high level card -->
    </div><!-- End Content Container -->


@endsection
