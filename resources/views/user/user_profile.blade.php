@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="card shadow">
            <h2 class="card-header">
                Profile {{ ' - '.$user->assigned_id }}
            </h2>
            <div class="card-body">

                <!-- Personal Info Card -->
                <div class="card mb-3 shadow">
                    <h5 class="card-header">Profile Information</h5>
                    <div class="card-body">
                        <div class="row">
                            <dt class="col-1">Full Name</dt>
                            <dd class="col-6">{{ $user->firstname }}{{ ' '.$user->middlenames.' ' ?? ' ' }}{{ $user->surname }}</dd>
                        </div>
                        <div class="row">
                            <dt class="col-2">Date of Birth</dt>
                        </div>
                    </div>
                </div>

                <!-- Address Card -->
                <div class="card my-3 shadow">
                    <h5 class="card-header">User Information</h5>
                    <div class="card-body p-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="card-text">
                                    <div class="col text">Username : {{ $user->username }}</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col text">Last Login: {{ $user->last_login_datetime }}</div>
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
