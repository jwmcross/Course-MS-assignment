@extends('layouts.app')


@section('content')
    <div class="container-fluid">
        <h1 class="h1">Student Information</h1>
        <div class="card shadow">
            <h2 class="card-header">
                Student ID - {{ $student->assigned_id }}
            </h2>
            <div class="card-body">

                <!-- Personal Info Card -->
                <div class="card mb-3 shadow">
                    <h5 class="card-header">Personal Information</h5>
                    <div class="card-body">
                        <div class="row">
                            <dt class="col-1">Full Name</dt>
                            <dd class="col-6">{{ $student->firstname }}{{ ' '.$student->middlenames.' ' ?? ' ' }}{{ $student->surname }}</dd>
                        </div>
                        <div class="row">
                            <dt class="col-1">Date of Birth</dt>
                            <dd class="col-3">{{ $student->formatDob() }}</dd>
                            <dt class="col-1">Age</dt>
                            <dd class="col-3">{{ $student->calculateAge() }} years old</dd>
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
                      <h5 class="h5 font-weight-bold text-primary">Term Address</h5>
                      <div class="row">
                        <dt class="col-3">Street</dt>
                        <dd class="col-9">{{ $student->term_address_street }}</dd>

                            <dt class="col-3">Town/City</dt>
                            <dd class="col-9">{{ $student->term_address_city }}</dd>

                            <dt class="col-3">Post Code</dt>
                            <dd class="col-9">{{ $student->term_address_postcode }}</dd>

                            <dt class="col-3">Country</dt>
                            <dd class="col-9">{{ $student->term_address_country }}</dd>
                        </div>
                    </div>
                    <div class="col-4">
                        <h5 class="h5 font-weight-bold text-primary">Home Address</h5>
                        <div class="row">
                            <dt class="col-3">Street</dt>
                            <dd class="col-9">{{ $student->home_address_street }}</dd>

                            <dt class="col-3">Town/City</dt>
                            <dd class="col-9">{{ $student->home_address_city }}</dd>

                            <dt class="col-3">Post Code</dt>
                            <dd class="col-9">{{ $student->home_address_postcode }}</dd>

                            <dt class="col-3">Country</dt>
                            <dd class="col-9">{{ $student->home_address_country }}</dd>
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
                            <dd class="col-8">{{ $student->contact_no }}</dd>
                        </div>
                    </div>
                    <div class="col-4">
                        <h5 class="h5 font-weight-bold text-primary">Email</h5>
                        <div class="row">
                            <dd class="col-8">{{ $student->email }}</dd>
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
