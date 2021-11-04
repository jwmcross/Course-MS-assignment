@extends('layouts.app')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow ">
            <form action="{{ route('create_course') }}" method="POST">
                @csrf
                <div class="card-header">
                    <legend>Add new Course</legend>
                </div>
                <fieldset class="form-group mb-5">
                    <div class="card-body">

                        @include('course.course_form')

                        <!-- Submit -->
                            <div class="form-group row d-flex justify-content-center">
                                <div class="col-auto">
                                    <button class="btn btn-primary btn-lg" type="submit" name="submit">
                                        Create Course
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
