@extends('layouts.app')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Employees</h1>
    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p> -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Employees Detail</h6>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>

                            <th>Employee</th>
                            <th>Deduction</th>
                            <th>Overtime</th>
                            <th>Latetime</th>
                            <th>Salary</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($users as $us)

                        <tr>

                            <td><div class='row'><div class='col-md-3 text-center'><img src='{{ asset("images/" . $us->image)}}' class='rounded-circle table-user-thumb'></div><div class='col-md-6 col-lg-6 my-auto'><b class='mb-0'>{{$us->FirstName." ".$us->LastName}}</b><p class='mb-2' title='{{$us->id }}'><small><i class='ik ik-at-sign'></i>{{$us->id }}</small></p></div><div class='col-md-4 col-lg-4'><small class='text-muted float-right'></small></div></div></td>
                            <td>{{ ($us->deductions!=null)?$us->deductions:'00' }}</td>
                            <td>{{ ($us->overtime!=null)?$us->overtime.'-mins':'0-mins'}}</td>
                            <td>{{ ($us->latetime!=null)?$us->latetime.'-mins':'0-mins'}}</td>
                            <td>{{ number_format($us->salary, 2, '.', ',') }}</td>
                            <td class="d-flex">
                                <a href="{{ route('edit.salary', $us->id) }}" ><i class="fa-solid fa-pen">Edit</i></a>


                            </td>

                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
