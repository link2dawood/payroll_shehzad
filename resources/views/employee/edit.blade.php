@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Employee</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('update.employ',$user->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="mb-3 col-md-3">
                                <label for="account_type" class="form-label">{{ __('Account type*') }}</label>

                                <select class="form-control " name="account_type" required>
                                    <option value="{{ $user->account_type }}">{{ $user->account_type }}</option>

                                    <option value="active">active</option>
                                    <option value="inactive">inactive</option>


                                </select>
                            </div>

                            <div class="mb-3 col-md-3">
                                <div class="">
                                    <label for="email" class="form-label">{{ __('Email Address*') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 col-md-3">


                                <div class="">
                                    <label for="user_id" class="form-label">{{ __('User_id*') }}</label>
                                    <input id="city" type="text" class="form-control" name="user_id" value="{{ $user->user_id }}" required>
                                </div>
                            </div>
                            <div class="mb-3 col-md-3">
                                <label for="active" class="form-label">{{ __('Status*') }}</label>

                                <select class="form-control " name="active" required>
                                    <option value="{{ $user->active }}">{{ $user->active }}</option>

                                    <option value="active">active</option>
                                    <option value="inactive">inactive</option>


                                </select>
                            </div>





                            <div class="mb-3 col-md-3">
                                <label for="company_id" class="form-label">{{ __('Company') }}</label>

                                <select class="form-control " name="company_id" required>
                                @foreach($comp as $cp)
                                @if($cp->id==$user->company_id)
                                <option value="{{$cp->id}}">{{$cp->CreateCompany}}</option>
                                @endif
                                <option value="{{$cp->id}}">{{$cp->CreateCompany}}</option>
                                @endforeach
                                </select>
                            </div>





                        </div>
                </div>
                <div class="card">
                    <div class="card-header">Phone</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-3">


                                <div class="">
                                    <label for="mobile" class="form-label">{{ __('Mobile') }}</label>
                                    <input id="mobile" type="text" class="form-control" placeholder="Mobile No" value="{{ $user->mobile }}" name="mobile" required>
                                </div>
                            </div>
                            <div class="mb-3 col-md-3">


                                <div class="">
                                    <label for="altnumber" class="form-label">{{ __('Alternate Phone Number') }}</label>
                                    <input id="altnumber" type="text" class="form-control" placeholder="Alternate Phone Number" value="{{ $user->altnumber }}" name="altnumber" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">Personal Details</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-3">
                                <div class="">
                                    <label for="FirstName">{{ __('FirstName') }}</label>
                                    <input id="FirstName" type="text" class="form-control @error('FirstName') is-invalid @enderror" name="FirstName" value="{{ $user->FirstName }}" required autocomplete="FirstName" autofocus>

                                </div>
                            </div>
                            <div class="mb-3 col-md-3">
                                <div class="">
                                    <label for="name">{{ __('LastName*') }}</label>
                                    <input id="LastName" type="text" class="form-control @error('LastName') is-invalid @enderror" name="LastName" value="{{ $user->LastName }}" required autocomplete="name" autofocus>

                                </div>
                            </div>
                            <div class="mb-3 col-md-3">


                                <div class="">
                                    <label for="city" class="form-label">{{ __('City') }}</label>
                                    <input id="city" type="text" class="form-control" name="city" value="{{ $user->city }}" required>
                                </div>
                            </div>
                            <div class="mb-3 col-md-3">


                                <div class="">
                                    <label for="country" class="form-label">{{ __('Country') }}</label>
                                    <input id="country" type="text" class="form-control" name="country" value="{{ $user->country }}" required>

                                </div>
                            </div>
                            <div class="mb-3 col-md-3">


                                <div class="">
                                    <label for="dob" class="form-label">{{ __('Date of Birth') }}</label>
                                    <input id="dob" type="text" class="form-control" name="dob" value="{{ $user->dob }}" required>
                                    <input id="active" type="hidden" name="active" value="2" required>
                                </div>
                            </div>
                            <div class="mb-3 col-md-3">


                                <div class="">
                                    <label for="vat" class="form-label">{{ __('Vat TRN No') }}</label>
                                    <input id="vat" type="text" class="form-control" name="vat" value="{{ $user->vat }}" required>
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
                                    <input id="position" type="text" class="form-control" name="position" value="{{ $user->position }}" required>
                                </div>

                            </div>
                            <div class="mb-3 col-md-4">


                                <div class="">
                                    <label for="salary" class="form-label">{{ __('Salary') }}</label>
                                    <input type="number" min="1" step="any" class="form-control" name="salary" value="{{ number_format($user->salary, 2, '.', ',') }}" required>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
                <div class="card">
                    <div class="card-header">Document</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-4">


                                <div class="">
                                    <label for="doc_type" class="form-label">{{ __('Document Type') }}</label>
                                    <input id="doc_type" type="text" class="form-control" name="doc_type" value="{{ $user->doc_type }}" required>
                                </div>

                            </div>
                            <div class="mb-3 col-md-4">


                                <div class="">
                                    <label for="image" class="form-label">{{ __('Image') }}</label>
                                    <input type="file" class="form-control"  name="image" >
                                    <img src="{{ URL::asset('/images/'.$user->image) }}" width="100px">
                                </div>

                            </div>
                        </div>

                        <div class="row" id="add">
                        @foreach (json_decode($user->multipleimages) as $image )
                            <div class="mb-3 col-md-3">
                                <label for="multipleimages" class="form-label">{{ __('Document') }}</label>
                                <input type="file" class="form-control" name="multipleimages[]"  multiple>
                                <img src="{{ URL::asset('/images/'.$image) }}" width="100px">
                            </div>
                            @endforeach
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-4">
                            <label for="multipleimages" class="form-label">{{ __('Add Document') }}</label>
                                <button class="btn btn-info ml-2" id="images">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
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

                                <a href="#" data-toggle="modal" class="btn btn-danger" data-target="#reset_password">Reset Password</a>
                            </div>
                        </div>
                    </form>
                    <div class="modal fade" id="reset_password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('update.password',$user->id) }}" id="reset">
                                        @csrf


                                        <input type="hidden" name="token" value="{{ $token }}">
                                        <div class="row mb-3">
                                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                            </div>
                                        </div>

                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <a class="btn btn-primary" href="{{ route('password.update') }}" onclick="event.preventDefault();
            document.getElementById('reset').submit();">

                                        {{ __('Reset Password') }}</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
