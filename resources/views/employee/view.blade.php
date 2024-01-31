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
                            <th>Image</th>
                            <th>Name</th>
                            <th>City</th>
                            <th>Country</th>
                            <th>Company</th>
                            <th>Salary</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($user as $us)

                        <tr>
                            <td><img src="{{ URL::asset('/images/'.$us->image) }}" width='100px'></td>
                            <td>{{ $us->FirstName }}</td>
                            <td>{{ $us->city }}</td>
                            <td>{{ $us->country}}</td>
                            @foreach($comp as $cp)
                            @if($us->company_id==$cp->id)
                            <td>{{ $cp->CreateCompany }}</td>
                            @endif
                            @endforeach
                            <td>{{ number_format($us->salary, 2, '.', ',') }}</td>
                            <td class="d-flex">
                                <a href="{{ route('edit.employ', $us->id) }}" class="btn btn-primary mr-1">edit</a>
                                <a href="#" data-toggle="modal" class="btn btn-danger" data-target="#delete_record{{$us->id}}">

                                    Delete
                                </a>

                            </td>

                        </tr>
                        <div class="modal fade" id="delete_record{{$us->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">Select "Delete" below if you are ready to delete the record of Employee.</div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                        <a class="btn btn-primary" href="{{ route('destroy.employ', $us->id) }}" >

                                            {{ __('Delete') }}</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
