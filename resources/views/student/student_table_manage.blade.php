@extends('layouts/app')



@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Student Records</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Students</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>Name</th>
                            <th>Course</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Student ID</th>
                            <th>Name</th>
                            <th>Course</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($student_arr as $student)
                            <tr>
                                <td>{{ $student->assigned_id }}</td>
                                <td>{{ $student->title}}. {{ $student->firstname}} {{ $student->surname }}</td>
                                <td>{{ $student->course()->first()->course_title ?? 'N/A' }}</td>
                                <td>{{ $student->student_status }}</td>
                                <td class="align-middle m-0">
                                    <div class="d-flex justify-content-center m-0">
                                        <button class="btn btn-primary btn-icon-split mr-2 btn-sm"
                                                onclick="window.location.href='{{ route('view_student', $student) }}'">
                                        <span class="icon">
                                            <i class="fas fa-eye"></i>
                                        </span>
                                            <span class="text">View</span>
                                        </button>

                                        <button class="btn btn-info btn-icon-split mr-2 btn-sm"
                                                onclick="window.location.href='{{ route('modify_student', $student) }}'">
                                        <span class="icon">
                                            <i class="fas fa-cog"></i>
                                        </span>
                                            <span class="text">Edit</span>
                                        </button>

                                        <form action="{{ route('student.archive_student', $student) }}" method="POST">
                                            @csrf
                                        <button class="btn btn-secondary btn-icon-split mr-2 btn-sm">
                                            <span class="icon">
                                                <i class="fas fa-archive"></i>
                                            </span>
                                            <span class="text">Archive</span>
                                        </button>
                                        </form>

                                        <button class="btn btn-icon-split btn-danger mr-2 btn-sm" data-toggle="modal" data-target="#deleteModal"
                                                data-href="{{ route('delete_student',$student) }}">
                                        <span class="icon">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                            <span class="text">Delete</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Confirm to delete the selected record.</div>
                <div class="modal-footer">
                    <button class="btn btn-primary btn-delcancel" type="button" data-dismiss="modal">Cancel</button>
                    <form class="delconfirm" action="" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Confirm Delete</button>
                    </form>
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

