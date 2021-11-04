<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Woodlands University College - Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-success">

<div class="container-fluid">


    <div class="row align-items-center justify-content-around" style="height:50vh">

        <div class="col-4">
            <div class="d-flex align-self-center justify-content-center" style="opacity:65%">
                <img class="rotate-15 rounded" src="img/logo.png"/>
            </div>
        </div>

        <div class="col-4">
            <div class="d-flex align-self-center justify-content-center">
                <img class="w-75" src="img/logo.png"/>
            </div>
        </div>

        <div class="col-4">
            <div class="d-flex align-self-center justify-content-center" style="opacity:65%">
                <img class="rotate-15 rounded" src="img/logo.png"/>
            </div>
        </div>

    </div>

    <div class="row align-items-center justify-content-around" style="width:100%; height:50vh">

        <div class="col-4">
            <div class="d-flex align-self-center justify-content-center" style="opacity:65%">
                <img class="rotate-15 rounded" src="img/logo.png"/>
            </div>
        </div>

        <div class="col-4">
            <div class="text-center">
                <h1 class="h1 text-gray-900">Welcome to</h1>
                <h1 class="h1 text-gray-900"><strong><u>Woodlands University College</u></strong></h1><br>
                <h1 class="h1 text-gray-900">Records Management System</h1>
            </div>
            <div class="row">
                <div class="col">
                    <div class="p-5">

                        <form class="user" action="{{ route('login') }}" method="POST">
                        @csrf
                        <!-- Username Field -->
                            @error('username')
                            <div class="row align-items-center justify-content-center mb-2" role="alert">
                                <div class="justify-content-center alert-danger p-2 rounded-pill"><i class="fas fa-exclamation-triangle fa-1x"></i>{{ $message }}</div>
                            </div>
                            @enderror
                            <div class="form-group row justify-content-center">
                                <div class="col-6">
                                    <input id="username" type="text"
                                           class="form-control form-control-user @error('username') is-invalid @enderror"
                                           name="username"
                                           placeholder="Username"
                                           value="{{ old('username') }}" required autocomplete="username" autofocus>
                                </div>
                            </div>
                            <!-- Password Field -->
                            <div class="form-group row justify-content-center">


                                <div class="col-6">
                                    <input id="password" type="password"
                                           class="form-control form-control-user @error('password') is-invalid @enderror"
                                           name="password"
                                           placeholder="Password"
                                           required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                    @enderror


                                </div>
                            </div>
                            <div class="form-group row mb-0 justify-content-center ">

                                <button type="submit" class="btn btn-primary btn-rounded btn-lg w-25">
                                    {{ __('Login') }}
                                </button>

                            </div>
                            <!--
                            <div class="form-group">
                              <input type="text" class="form-control form-control-user" id="exampleInputUsername" aria-describedby="emailHelp" placeholder="Enter Username...">
                            </div>
                            <div class="form-group">
                              <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                            </div>
                            <div class="form-group">
                              <input class="btn btn-primary btn-user btn-block" type="submit" name="submit" value="Login">
                            </div>-->
                        </form>
                    </div>
                </div>
            </div>


        </div>

        <div class="col-4">
            <div class="d-flex align-self-center justify-content-center" style="opacity:65%">
                <img class="rotate-15 rounded" src="img/logo.png"/>
            </div>
        </div>

    </div>

    <!--<div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">

         <div class="container justify-content-center align-content-center">
              <div class="row align-items-center justify-content-center m-auto">
                <div class="col m-auto justify-content-center">
                  <img class="w-100" src="img/logo.png"/>
                </div>
              </div>

              <div class="row">
                <div class="col">
                  <div class="p-5">

                    <form class="user" action="/login" method="POST">
                      <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="exampleInputUsername" aria-describedby="emailHelp" placeholder="Enter Username...">
                      </div>
                      <div class="form-group">
                        <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <input class="btn btn-primary btn-user btn-block" type="submit" name="submit" value="Login">
                      </div>
                    </form>
                  </div>
                </div>
              </div>

            </div>
        </div>
    </div>-->

</div>

</div>

</div>


<!--
  <div class="container">

    <!-- Outer Row
    <div class="row">

      <div class="col">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
              <!-- Nested Row within Card Body
              <div class="container justify-content-center">
                  <div class="row d-flex align-content-center">
                    <div class="col align-content-center">
                      <div class="align-content-center">
                        <img src="img/logo.png"/>
                      </div>

                    </div>
                  </div>

                  <div class="row">
                    <div class="col">
                      <div class="p-5">
                        <div class="text-center">
                          <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                        </div>
                        <form class="user">
                          <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="exampleInputUsername" aria-describedby="emailHelp" placeholder="Enter Username...">
                          </div>
                          <div class="form-group">
                            <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                          </div>
                          <a href="index.html" class="btn btn-primary btn-user btn-block">
                            Login
                          </a>
                        </form>
                      </div>
                    </div>
                  </div>

                </div>
            </div>
        </div>

      </div>

    </div>

  </div>-->

<!-- Bootstrap core JavaScript-->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('/sb-admin-2.min.js') }}"></script>

</body>

</html>
