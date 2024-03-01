@extends('dashboard')

@section('content')
    {{-- <p>Form Data </p> --}}
    <section class=" gradient-custom">
        <div class="container py-5 ">
          <div class="row justify-content-center align-items-center">
            <div class="col-12 col-lg-9 col-xl-12">
              <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                <div class="card-body p-4 p-md-5">
                  <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Add Employee Details</h3>
                  <form method="post" action="{{Route('add_employeedata')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-4 pb-2">

                          <div class="form-outline ">
                            <label class="form-label" for="lastName">Employee ID</label>

                            <input type="text" class="form-control form-control-lg" id="birthdayDate" placeholder="EmployeeID" name="employeeid"/>

                          </div>

                        </div>
                        <div class="col-md-6 mb-4 pb-2">

                            <div class="form-outline">
                            <label class="form-label" for="lastName">Department Name</label>

                              <input type="text" id="phoneNumber" class="form-control form-control-lg" placeholder="Department Name" name="department_name" />

                            </div>
                            </div>
                      </div>

                    <div class="row">
                      <div class="col-md-6 mb-4">

                        <div class="form-outline">
                            <label class="form-label" for="firstName">First Name</label>
                          <input type="text" id="firstName" class="form-control form-control-lg" placeholder="Firstname" name="firstname"/>
                        </div>

                      </div>
                      <div class="col-md-6 mb-4">

                        <div class="form-outline">
                            <label class="form-label" for="lastName">Last Name</label>
                          <input type="text" id="lastName" class="form-control form-control-lg" placeholder="Lastname" name="lastname"/>
                        </div>

                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6 mb-4 pb-2">

                        <div class="form-outline">
                            <label class="form-label" for="emailAddress">Email</label>
                          <input type="email" id="emailAddress" class="form-control form-control-lg" placeholder="Email Address" name="email"/>
                        </div>

                      </div>
                      <div class="col-md-6 mb-4 pb-2">

                        <div class="form-outline">
                            <label class="form-label" for="phoneNumber">Password</label>
                          <input type="password" id="phoneNumber" class="form-control form-control-lg" placeholder="Password" name="password" />
                        </div>

                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4 pb-2">

                          <div class="form-outline">
                            <label class="form-label" for="lastName">Manager Name</label>

                            <select class="form-control form-control-lg" name="managerid">
                                <option selected disabled>Choose a manager</option>
                                @foreach ($manager as $data )
                                    <option value="{{$data->id}}"> {{$data->name}} - "{{$data->department_name}}"</option>
                                @endforeach

                              </select>

                          </div>

                        </div>

                      </div>
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <span style="color: red">{{$error}}</span><br>
                            @endforeach
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success" id="alert">
                                <span style="color: green">{{ session('success') }}</span>
                            </div>
                        @endif
                    <div class="mt-4 pt-2">
                      <input class="btn btn-primary btn-lg" style="background: #433185" type="submit" value="Submit" />
                      <a class="btn btn-warning btn-lg"  href="/show-employee">Back</a>

                    </div>

                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <script>
        $('document').ready(function(){
            setTimeout(() => {
                $('div.alert').remove();
            }, 3000);
        });
    </script>
@endsection
