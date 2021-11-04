@extends('layouts.app')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow ">
            <form action="{{ route('create_student') }}" method="POST">
                @csrf
                <div class="card-header">
                    <legend>Add new Student Record</legend>
                </div>
                <fieldset class="form-group mb-5">
                    <div class="card-body">

                        @include('student.student_form')

                        <!-- Submit -->
                        <div class="form-group row d-flex justify-content-center">
                            <div class="col-auto">
                                <button class="btn btn-primary btn-lg" type="submit" name="submit">
                                    Create Record
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
