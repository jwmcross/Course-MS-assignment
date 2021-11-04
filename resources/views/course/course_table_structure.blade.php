@extends('layouts/app')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Course Records</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Courses</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Course Code</th>
                            <th>Title</th>
                            <th>Faculty</th>
                            <th>Award Level</th>
                            <th>Award Type</th>
                            <th>Num. Modules</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Course Code</th>
                            <th>Title</th>
                            <th>Faculty</th>
                            <th>Award Level</th>
                            <th>Award Type</th>
                            <th>Num. Modules</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($courses as $course)
                            <tr>
                                <td>{{ $course->course_code }}</td>
                                <td>{{ $course->course_title }}</td>
                                <td>{{ $course->courseFaculty() }}</td>
                                <td>{{ $course->award_level }}</td>
                                <td>{{ $course->award_type }} {{ $course->awardType() }}</td>
                                <td>{{ $course->numOfModules() }}</td>
                                <td class="m-0">
                                    <div class="d-flex justify-content-center m-0">
                                        <button class="btn btn-info btn-icon-split mr-2"
                                                onclick="window.location.href='{{ route('view_course', $course) }}'">
                                            <span class="icon">
                                                <i class="fas fa-eye"></i>
                                            </span>
                                            <span class="text">View</span>
                                        </button>
                                        <button class="btn btn-primary btn-icon-split mr-2"
                                                onclick="window.location.href='{{ route('course.structure_course', $course) }}'">
                                            <span class="icon">
                                                <i class="fas fa-cog"></i>
                                            </span>
                                            <span class="text">Structure Course</span>
                                        </button>
                                    </div>
                                    <!--</div>-->
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('page_plugins')
    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
    <script src="{{ asset('js/del.js') }}"></script>
@endsection
