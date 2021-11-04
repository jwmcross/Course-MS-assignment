@extends('layouts/app')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Current Users</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">User Accounts</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Roles</th>
                            <th>Created On</th>
                            <th>Last Login</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Roles</th>
                            <th>Created On</th>
                            <th>Last Login</th>
                            <th>Actions</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->username}}</td>
                                <td class="text-capitalize">{{ implode(', ',$user->roles()->pluck('name')->toArray()) }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>{{$user->last_login_datetime==null ? 'No Log' :  date_format(date_create($user->last_login_datetime),'H:i:s, l M Y') }}</td>
                                <td class="m-0">
                                    <div class="d-flex justify-content-center m-0">
                                        @can('manage-users')
                                            <a href="{{ route('admin.users.edit', $user->id) }}">
                                            <button class="btn btn-primary btn-icon-split mr-2">
                                            <span class="icon">
                                                <i class="fas fa-cog"></i>
                                            </span>
                                                <span class="text">Edit</span>
                                            </button>
                                            </a>
                                        @endcan
                                        <button class="btn btn-icon-split btn-danger mr-2" data-toggle="modal" data-target="#deleteModal"
                                                data-href="{{route('admin.users.destroy', $user) }}">
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
                <div class="modal-body">Confirm to delete the selected user.</div>
                <div class="modal-body bg-gradient-danger text-light"><i class="fas fa-exclamation-circle fa-1x"></i> This process cannot be undone. Will delete the user account.</div>
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
