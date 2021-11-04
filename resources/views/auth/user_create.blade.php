@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card shadow ">
            <form action="{{ route('admin.users.create_user') }}" method="POST">
                @csrf
                <div class="card-header">
                    <legend>Create User Account</legend>
                </div>
                <fieldset class="form-group mb-5">
                    <div class="card-body">
                        <div class="form-group form-row">
                            <div class="col-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Username</div>
                                    </div>
                                    <input id="username" class="form-control @error('username') is-invalid @enderror" type="text" name="username"
                                           value="{{ old('username') ?? $user->username }}"
                                           placeholder="username">
                                </div>
                                @error('username')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                        </div>

                        <div class="form-group form-row">
                            <div class="col-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Generated Temporary Password</div>
                                    </div>
                                    <input id="password" class="form-control @error('password') is-invalid @enderror" type="text" name="password"
                                           value="{{ old('password') ?? $user->password }}"
                                           placeholder="username">
                                </div>
                                @error('password')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                        </div>
                        <hr>
                        <div class="form-group form-row">
                            <div class="col-form-label">
                                <div class="input-group">
                                    <div class="input-group-prepend mr-2">
                                        <div class="input-group-text pr-5">Assign User Roles</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                @foreach($roles as $role)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{ $role->id }}" name="roles[]"
                                               @if($user->roles()->get()->pluck('id')->contains($role->id)) checked @endif>
                                        <label for="roles" class="form-check-label text-capitalize">{{ $role->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <hr>
                        <button class="btn btn-primary" type="submit">Create User Account</button>

                    </div>
                </fieldset>
            </form>
        </div>
    </div>

@endsection
