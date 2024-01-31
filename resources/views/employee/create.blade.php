@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Employee</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('store.employ') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-3">
                                <label for="account_type" class="form-label">{{ __('Account type*') }}</label>

                                <select class="form-control " name="account_type" required>
                                    <option value="">Select One</option>

                                    <option value="active">active</option>
                                    <option value="inactive">inactive</option>


                                </select>
                            </div>

                            <div class="mb-3 col-md-3">
                                <div class="">
                                    <label for="email" class="form-label">{{ __('Email Address*') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
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
                                    <input id="city" type="text" class="form-control" name="user_id" required>
                                </div>
                            </div>
                            <div class="mb-3 col-md-3">
                                <label for="active" class="form-label">{{ __('Status*') }}</label>

                                <select class="form-control " name="active" required>
                                    <option value="">Select</option>

                                    <option value="active">active</option>
                                    <option value="inactive">inactive</option>


                                </select>
                            </div>





                            <div class="mb-3 col-md-3">
                                <label for="company_id" class="form-label">{{ __('Company') }}</label>

                                <select class="form-control " name="company_id" required>
                                    <option value="">Select</option>
                                    @foreach($comp as $cp)
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
                                    <input id="mobile" type="text" class="form-control" placeholder="Mobile No" name="mobile" required>
                                </div>
                            </div>
                            <div class="mb-3 col-md-3">


                                <div class="">
                                    <label for="altnumber" class="form-label">{{ __('Alternate Phone Number') }}</label>
                                    <input id="altnumber" type="text" class="form-control" placeholder="Alternate Phone Number" name="altnumber" required>
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
                                    <input id="FirstName" type="text" class="form-control @error('FirstName') is-invalid @enderror" name="FirstName" value="{{ old('FirstName') }}" required autocomplete="FirstName" autofocus>

                                </div>
                            </div>
                            <div class="mb-3 col-md-3">
                                <div class="">
                                    <label for="name">{{ __('LastName*') }}</label>
                                    <input id="LastName" type="text" class="form-control @error('LastName') is-invalid @enderror" name="LastName" value="{{ old('LastName') }}" required autocomplete="name" autofocus>

                                </div>
                            </div>
                            <div class="mb-3 col-md-3">


                                <div class="">
                                    <label for="city" class="form-label">{{ __('City') }}</label>
                                    <input id="city" type="text" class="form-control" name="city" required>
                                </div>
                            </div>
                            <div class="mb-3 col-md-3">


                                <div class="">
                                    <label for="country" class="form-label">{{ __('Country') }}</label>
                                    <input id="country" type="text" class="form-control" name="country" required>

                                </div>
                            </div>
                            <div class="mb-3 col-md-3">


                                <div class="">
                                    <label for="dob" class="form-label">{{ __('Date of Birth') }}</label>
                                    <input id="dob" type="text" class="form-control" name="dob" required>
                                    <input id="active" type="hidden" name="active" value="2" required>
                                </div>
                            </div>
                            <div class="mb-3 col-md-3">


                                <div class="">
                                    <label for="vat" class="form-label">{{ __('Vat TRN No') }}</label>
                                    <input id="vat" type="text" class="form-control" name="vat" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">Password</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-3">

                                <div class="">
                                    <label for="password" class="form-label">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 col-md-3">


                                <div class="">
                                    <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
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
                                    <option value="{{$pop->id}}">{{$pop->position}}</option>
                                    @endforeach

                                </select>
                                </div>

                            </div>
                            <div class="mb-3 col-md-4">


                                <div class="">
                                    <label for="salary" class="form-label">{{ __('Salary') }}</label>
                                    <input type="number" min="1" step="any" class="form-control" name="salary" required>
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
                                    <input id="doc_type" type="text" class="form-control" name="doc_type" required>
                                </div>

                            </div>
                            <div class="mb-3 col-md-4">


                                <div class="">
                                    <label for="image" class="form-label">{{ __('Image') }}</label>
                                    <input type="file" class="form-control" name="image" required>
                                </div>

                            </div>
                        </div>
                        <div class="row" id="add">
                            <div class="mb-3 col-md-3">
                                <label for="multipleimages" class="form-label">{{ __('Document') }}</label>
                                <input type="file" class="form-control" name="multipleimages[]" multiple>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <button class="btn btn-info ml-2" id="images">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="card">
                <div class="card-body">
                    <div class="mb-0 col-md-3">
                        <div class="  d-flex">
                            <button type="submit" class="btn btn-primary mr-1">
                                {{ __('Create Employee') }}
                            </button>
                            <button class="btn-secondary btn" type="reset">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
