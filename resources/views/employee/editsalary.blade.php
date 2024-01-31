@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Employee</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('update.salary',$user->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-header">Deductions</div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="mb-3 col-md-4">


                                        <div class="">
                                            <label for="deductions" class="form-label">{{ __('Deductions') }}</label>
                                            <input id="deductions" type="number" min="1" step="any" class="form-control" name="deductions" value="{{ ($user->deductions!=null)?number_format($user->deductions, 2, '.', ','):'' }}">
                                        </div>

                                    </div>
                                    <div class="mb-3 col-md-4">


                                        <div class="">
                                            <label for="deductions_detail" class="form-label">{{ __('Details') }}</label>

                                            <textarea name="deductions_detail" class="form-control" rows="3">{{ $user->deductions_detail }}</textarea>
                                        </div>

                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">Time</div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="mb-3 col-md-4">


                                        <div class="">
                                            <label for="overtime" class="form-label">{{ __('Overtime') }}</label>
                                            <input id="overtime" type="number" min="1" step="any" class="form-control" name="overtime" value="{{ $user->overtime }}">
                                        </div>

                                    </div>
                                    <div class="mb-3 col-md-4">


                                        <div class="">
                                            <label for="latetime" class="form-label">{{ __('Latetime') }}</label>
                                            <input id="latetime" type="number" min="1" step="any" class="form-control" name="latetime" value="{{ $user->latetime }}">
                                        </div>

                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">Salary Details</div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="mb-3 col-md-4">


                                        <div class="">
                                            <label for="position" class="form-label">{{ __('Position') }}</label>
                                            <select class="form-control " name="position" required>
                                                <option value="">Select</option>

                                                @foreach($position as $pop)
                                                @if($pop->id==$user->position)
                                                <option value="{{$pop->id}}">{{$pop->position}}</option>
                                                @endif
                                                <option value="{{$pop->id}}">{{$pop->position}}</option>
                                                @endforeach

                                            </select>
                                        </div>

                                    </div>
                                    <div class="mb-3 col-md-4">


                                        <div class="">
                                            <label for="salary" class="form-label">{{ __('Salary') }}</label>
                                            <input type="number" min="1" step="any" class="form-control" name="salary" value="{{$user->salary}}" required>
                                        </div>

                                    </div>
                                </div>


                            </div>
                        </div>

                        <div class="row mb-0 col-md-3">
                            <div class="d-flex">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>

                                <a href="#" data-toggle="modal" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        @endsection
