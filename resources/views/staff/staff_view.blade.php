@extends('layouts.app')


@section('content')
    <div class="container-fluid">
        <h1 class="h1">Staff Information</h1>
        <div class="card shadow">
            <h2 class="card-header">
                Staff ID - {{ $staff->assigned_id }}
            </h2>
            <div class="card-body">

                <!-- Personal Info Card -->
                <div class="card mb-3 shadow">
                    <h5 class="card-header">Personal Information</h5>
                    <div class="card-body">
                        <div class="row">
                            <dt class="col-1">Full Name</dt>
                            <dd class="col-6">{{ $staff->title }}. {{ $staff->firstname }}{{ ' '.$staff->middlenames.' ' ?? ' ' }}{{ $staff->surname }}</dd>
                        </div>
                    </div>
                </div>

                <!-- Address Card -->
                <div class="card my-3 shadow">
                    <h5 class="card-header">
                        Address
                    </h5>
                    <div class="card-body p-2">
                        <div class="row m-3">
                            <div class="col-4">
                                <h5 class="h5 font-weight-bold text-primary">Address</h5>
                                <div class="row">
                                    <dt class="col-3">Street</dt>
                                    <dd class="col-9">{{ $staff->address_street }}</dd>

                                    <dt class="col-3">Town/City</dt>
                                    <dd class="col-9">{{ $staff->address_city }}</dd>

                                    <dt class="col-3">Post Code</dt>
                                    <dd class="col-9">{{ $staff->address_postcode }}</dd>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Personal Info Card -->
                <div class="card my-3 shadow">
                    <h5 class="card-header">
                        Contact Information
                    </h5>
                    <div class="card-body p-2">
                        <div class="row m-3">
                            <div class="col-4">
                                <h5 class="h5 font-weight-bold text-primary">Phone Number</h5>
                                <div class="row">
                                    <dd class="col-8">{{ $staff->contact_no }}</dd>
                                </div>
                            </div>
                            <div class="col-4">
                                <h5 class="h5 font-weight-bold text-primary">Email</h5>
                                <div class="row">
                                    <dd class="col-8">{{ $staff->email }}</dd>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Roles Card -->
                <div class="card my-3 shadow">
                    <h5 class="card-header">
                        Academic Information
                    </h5>
                    <div class="card-body p-2">
                        <div class="row m-3">
                            <div class="col-4">
                                <h5 class="h5 font-weight-bold text-primary">Roles</h5>
                                <div class="row">
                                    {{  implode(', ',array_unique($staff->roles())) }}
                                    {{-- $staff->associatedCourse()->first()->course_title --}}
                                </div>
                            </div>

                            <div class="col-4">
                                <h5 class="h5 font-weight-bold text-primary">Specialist Subjects</h5>
                                <div class="row">
                                    @forelse($staff->specialist_subjects as $subject)
                                        <dd class="col-8">{{ $subject }}</dd>
                                    @empty
                                        <dd class="col-8">empty</dd>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- End of high level card body -->
            </div>
            <!-- End of high level card -->
        </div>




    </div>

@endsection
