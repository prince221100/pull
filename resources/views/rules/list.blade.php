@include('dashboard')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Rules</h1>
  
   
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
    <div class="card-header py-3">
    <a class="btn btn-lg-sm btn-primary" href="{{ route('rules.add') }}" role="button">Add Rules</a>
                        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Question</th>
                            <th>Answer</th>
                            <th>Type</th>
                            <th></th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Question</th>
                            <th>Answer</th>
                            <th>Type</th>
                            <th> </th>
                            <th> </th>
                            
                        </tr>
                    </tfoot>
                    <tbody>
                   @foreach($data as $datas)
                        <tr>
                         
                            <td>{{ $datas->rules}}</td>
                           
                       <td><a class="btn btn-lg-sm btn-success" href="{{ route('rules.edit', $datas->id) }}" role="button">Edit Information</a></td>
                       <td><a class="btn btn-lg-sm btn-danger" href="{{ route('rules.delete', $datas->id) }}" role="button">Delete Information</a></td>  
                    </tr>
                        @endforeach 
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

