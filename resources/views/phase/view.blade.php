@extends('layouts.app')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Phases</h1>
    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p> -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Phases Detail</h6>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Phase Name</th>
                            <th>Owner type</th>
                            <th>Owner</th>
                            <th>Service fee</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($phase as $ph)
                        <tr>
                            <td><img src="{{ URL::asset('/images/'.$ph->image) }}" width='100px'></td>
                            <td>{{ $ph->PhaseName }}</td>
                            <td>{{ $ph->OwnerType }}</td>
                            <td>{{ $ph->Owner}}</td>
                            <td>{{ $ph->ServiceFee }}</td>
                            <td class="d-flex">
                                <a href="{{ route('edit.phase', $ph->id) }}" class="btn btn-primary mr-1">edit</a>
                                <a  href="#" data-toggle="modal" class="btn btn-danger" data-target="#delete_record{{$ph->id}}">

                                     Delete
                                </a>
                                <!-- <a data-action="delete_record" href="{{ route('destroy.phase', $ph->id) }}" onclick="return confirm('Are you sure you want to delete this Phase?');" class="btn btn-danger" data-url="{{ route('destroy.phase', $ph->id) }}" data-action-after="reload">Delete</a> -->

                            </td>

                        </tr>
                                            <div class="modal fade" id="delete_record{{$ph->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                <div class="modal-body">Select "Delete" below if you are ready to delete the phase.</div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                    <a class="btn btn-primary" href="{{ route('destroy.phase', $ph->id) }}" >

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
