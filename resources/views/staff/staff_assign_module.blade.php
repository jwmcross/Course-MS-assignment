@extends('layouts.app')


@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow ">
            <form action="{{ route('staff.save_assign_module', $staff) }}" method="POST">
                @csrf
                <div class="card-header">
                    <legend>Assign Module Leader for - {{ $staff->title }}. {{ $staff->firstname }} {{ $staff->surname }}</legend>
                </div>
                <fieldset class="form-group mb-5">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%"
                                   cellspacing="0">
                                <thead>
                                <tr>
                                    <th scope="col" style="width:5%">Select</th>
                                    <th scope="col">Module Title</th>
                                    <th scope="col">Module Code</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($modules as $module)
                                    <tr>
                                        <td class="d-flex justify-content-center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                       value="{{ $module->id }}" name="modules[]"
                                                @if($staff->modules->pluck('id')->contains($module->id)) checked @endif
                                                >
                                            </div>
                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                {{ $module->title }}
                                            </label>
                                        </td>
                                        <td>
                                            <label class="form-check-label">
                                                {{ $module->module_code }}
                                            </label>
                                        </td>
                                    </tr>
                                @endforeach


                                </tbody>
                            </table>
                            <hr>
                            <button class="btn btn-primary btn-lg" type="submit">Save Assigned Modules</button>
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
