<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Reset Password</title>
    <link rel="shortcut icon" type="image/png" href="../admin/img/Trilokn_Logo.png" />

    <!-- Custom fonts for this template-->
    <link href="{{ url('admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet')}}" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ url('admin/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9" style="margin:200px;">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 ">
                                <img src="{{ url('admin/img/Trilokn_Logo.png')}}" height="100%" width="100%"></img>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Reset</h1>
                                    </div>
                                    <form class="user" action="{{Route('reset')}}" method="POST">
                                        @csrf
                                        <input type="text" name="token" hidden value="{{$token}}">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." name="email" value="{{$email}}" disabled>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control"
                                                id="exampleInputPassword" placeholder="Password" name="password">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control"
                                                id="exampleInputPassword" placeholder="Confirm Password" name="confirmpassword">
                                        </div>
                                        @if ($errors->any())
                                            @foreach ($errors->all() as $error)
                                                <span style="color: red">{{$error}}</span><br>
                                            @endforeach
                                        @endif
                                        <button class="btn btn-primary btn-user btn-block" type="submit" style="background: #433185">
                                            Reset Password
                                        </button>

                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
