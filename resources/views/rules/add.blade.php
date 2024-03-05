@include('dashboard')
<?php
// printf($users);
// exit();
?>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-8 col-lg-12 col-md-7">
            @if ($errors->any())
                        <ul class="alert alert-warning">
                            @foreach ($errors->all() as $error)
                            <li> {{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">

                            <div class="col-lg-10">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-">Add Rules</h1>
                                        &nbsp;
                                    </div>
                                    <form method="POST" action="{{ route('rules.store') }}" enctype="multipart/form-data">
                                     @csrf
                                        <div class="form-group">
                                        <label class="col-lg-4 col-form-label" for="val-suggestions">Rule<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control form-control-user"  name="rule" placeholder="Enter Rule">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block"> Save </button>
                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

</div>

