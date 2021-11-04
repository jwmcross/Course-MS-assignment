@extends('layouts.app')


@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow ">
            <form action="{{ route('staff.save_assign_course', $staff) }}" method="POST">
                @csrf
                <div class="card-header">
                    <legend>Assign Course Leader for - {{ $staff->title }}. {{ $staff->firstname }} {{ $staff->surname }}</legend>
                </div>
                <fieldset class="form-group mb-5">
                    <div class="card-body">
                        <div class="card-title font-weight-bold text-primary mb-3">Select Course To Assign</div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%"
                                   cellspacing="0">
                                <thead>
                                <tr>
                                    <th scope="col" style="width:5%">Select</th>
                                    <th scope="col">Course Code</th>
                                    <th scope="col">Course Title</th>
                                    <th scope="col">Faculty</th>
                                    <th scope="col">Award Level</th>
                                    <th scope="col">Award Type</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th scope="col" style="width:5%">Select</th>
                                    <th scope="col">Course Code</th>
                                    <th scope="col">Course Title</th>
                                    <th scope="col">Faculty</th>
                                    <th scope="col">Award Level</th>
                                    <th scope="col">Award Type</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($courses as $course)
                                    <tr>
                                        <td class="d-flex justify-content-center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                       value="{{ $course->id }}" name="courses[]"
                                                       @if($staff->courses->pluck('id')->contains($course->id)) checked @endif
                                                >
                                            </div>
                                        </td>
                                        <td>{{ $course->course_code }}</td>
                                        <td>{{ $course->course_title }}</td>
                                        <td>{{ $course->courseFaculty() }}</td>
                                        <td>{{ $course->award_level }}</td>
                                        <td>{{ $course->awardType() }}</td>
                                    </tr>
                                @endforeach


                                </tbody>
                            </table>
                            <hr>
                        </div>
                        <div class="form-group row d-flex justify-content-center">
                            <div class="col-auto">
                                <button class="btn btn-primary btn-lg" type="submit">
                                    Add Assigned Course
                                </button>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>

@endsection

@section('page_plugins')
    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
@endsection
