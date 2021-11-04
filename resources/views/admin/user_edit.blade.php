@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="card shadow">
            <div class="card-header">
                User Profile
            </div>

            <div class="card-body">
                <form action="{{ route('admin.users.update', $user) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="form-group form-row">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Username</div>
                            </div>
                            <input type="text" name="username" value="{{ $user->username }}"/>
                        </div>
                    </div>
                    @error('username')<small class="text-danger">{{ $message }}</small>@enderror
                    <div class="form-group form-row">
                        <div class="col-form-label">
                        <div class="input-group">
                            <div class="input-group-prepend mr-2">
                                <div class="input-group-text pr-5">Roles</div>
                            </div>
                        </div>
                        </div>
                        <div class="col">
                        @foreach($roles as $role)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{ $role->id }}" name="roles[]"
                                       @if($user->roles()->get()->pluck('id')->contains($role->id)) checked @endif
                                <label for="roles" class="form-check-label">{{ ucfirst($role->name) }}</label>
                            </div>
                        @endforeach
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Password</div>
                            </div>
                            <input type="text" name value="*********" readonly/>
                        </div>
                    </div>

                    <hr>
                    <button class="btn btn-primary" type="submit">Save Changes</button>
                </form>
                <hr>
                <form action="{{ route('admin.users.reset_password', $user) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="card-header mb-2">To User Reset Password. Will create a new temporary password</div>
                    <label class="form-check-label mr-2">Create temporary password</label>
                    <button class="btn btn-warning border-danger font-weight-bold text-dark" type="submit">Reset Password</button>
                    <label class="form-check-label ml-2 text-danger">Process Cannot be undone!</label>
                </form>
            </div>
        </div>
    </div>


@endsection
