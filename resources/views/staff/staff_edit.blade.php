@extends('layouts.app')

<?php $modify = true;?>

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow ">
            <form action="{{ route('update_staff', $staff) }}" method="POST">
                @csrf
                @method('PATCH')
                @foreach($errors->all() as $error)
                <p>{{$error}}</p>
                @endforeach
                <div class="card-header">
                    <legend>Update Staff Record</legend>
                </div>
                <fieldset class="form-group mb-5">
                    <div class="card-body">

                        @include('staff.staff_form')

                        <!-- Submit -->
                        <div class="form-group row d-flex justify-content-center">
                            <div class="col-auto ">
                                <button class="btn btn-primary btn-lg" type="submit" name="submit">
                                    Update Record
                                </button>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
    <!-- End of Main Content -->

@endsection

@section('page_plugins')
    <script src="{{ asset('js/addrow.js') }}"></script>
@endsection
