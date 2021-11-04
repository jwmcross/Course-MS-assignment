@extends('layouts/app')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Staff Records With No User Account</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Staff</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Staff ID</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Staff ID</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($staff_arr as $staff)
                            <tr>
                                <td>{{ $staff->id }}</td>
                                <td>{{ $staff->assigned_id}}</td>
                                <td>{{ $staff->title }}. {{ $staff->firstname }}{{ ' '.$staff->middlenames.' ' ?? ' ' }}{{ $staff->surname }}</td>
                                <td class="m-0">
                                    <div class="d-flex justify-content-end m-0">
                                        <button class="btn btn-primary btn-icon-split mr-2"
                                                onclick="window.location.href='{{ route('admin.users.new_staff_user', $staff) }}'">
                                        <span class="icon">
                                            <i class="fas fa-user"></i>
                                        </span>
                                            <span class="text">Create User Account</span>
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
