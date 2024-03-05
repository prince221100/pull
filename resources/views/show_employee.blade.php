
@extends('dashboard')

@section('content')

    <div class="container-fluid">
        @if (session('success'))
        <div class="alert alert-success" id="alert">
            <span style="color: green">{{ session('success') }}</span>
        </div>
         @endif
        <!-- Page Heading -->
        <div class="row">
            <div class="col-md-6 mb-4 pb-2">
                <h1 class="h3 mb-2 text-gray-800">Employee Lists </h1>
            </div>
            <div class="col-md-6 mb-4 pb-2" style="text-align: right">
                <a class="btn btn-primary btn-md" style="background: #433185" href="{{Route('add_employee')}}">Add Employee</a>
            </div>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    {{-- <div >
                        <h6 class="m-0 font-weight-bold text-primary">Employees</h6>
                    </div> --}}
                    <div class="col-md-12 " style="text-align: right" >
                        <a class="btn btn-primary btn-md" style="background: #0f9721" href="{{Route('generate.csv')}}">Download CSV</a>
                    </div>

                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Employee ID</th>
                                <th>Email ID</th>
                                <th>Password</th>
                                <th>Department</th>
                                <th>Action</th>

                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($data as $val )

                            <tr>
                                <td>{{$val->firstname}}</td>
                                <td>{{$val->employee_id}}</td>
                                <td>{{$val->email}}</td>
                                <td>{{$val->password}}</td>
                                <td>{{$val->users_department}}</td>
                                <td>
                                    <a class="btn btn-primary btn-md edit" style="background: #433185" href="#" data-id="{{$val->id}}">Edit</a>
                                    <a class="btn btn-danger btn-md del" href="#" data-id="{{$val->id}}">Delete</a>


                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $data->links('pagination::bootstrap-5')}}
                </div>
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <span style="color: red">{{$error}}</span><br>
                    @endforeach
                @endif

            </div>
        </div>
    </div>
        <script>
            $(document).ready(function(){
                $(".edit").click(function(){
                    if(confirm("Are You sure for Edit Information ??")){
                        last_clicked_id = $(this).data("id");
                        window.location.href = "/edit-employee/"+last_clicked_id;
                        console.log('Edit Page',last_clicked_id);
                    }else{
                        window.location.href = "/show-employee";
                        console.log('same Page');

                    }

                });
                $(".del").click(function(){
                    if(confirm("Are You sure for Delete Information ??")){
                        last_clicked_id = $(this).data("id");
                        window.location.href = "/delete-employee/"+last_clicked_id;
                        console.log('delete Page',last_clicked_id);
                    }else{
                        window.location.href = "/show-employee";
                        console.log('same Page');

                    }
                });

                setTimeout(() => {
                            $('div.alert').remove();
                        }, 3000);
                  });


        </script>
@endsection
