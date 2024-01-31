

@extends('layouts.app')

@section('content')
<div class="row">
                        <div class="col-lg-12">
                            <!-- Basic Card Example -->
                            <form action="{{ route('update', $comp->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Update Company</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                        <label for="CreateCompany"  class="form-label">Company Name*</label>
                                        <input type="text" name="CreateCompany" placeholder="Company Name" value="{{ $comp->CreateCompany }}" class="form-control" required>
                                        </div>
                                        <div class="col-md-3">
                                        <label for="DispalyName"  class="form-label">Display Name*</label>
                                        <input type="text" name="DispalyName" class="form-control" value="{{ $comp->DispalyName }}" placeholder="Display Name" required>
                                        </div>
                                        <div class="col-md-3">
                                        <label for="Address1"  class="form-label">Address 1*</label>
                                        <input type="text" name="Address1" class="form-control" value="{{ $comp->Address1 }}" placeholder="Address 1" required>
                                        </div>
                                        <div class="col-md-3">
                                        <label for="Address2"  class="form-label">Address 2*</label>
                                        <input type="text" name="Address2" placeholder="Address2"  value="{{ $comp->Address2 }}" class="form-control">
                                        </div>
                                        <div class="col-md-3 mt-3">
                                        <label for="City"  class="form-label">City*</label>
                                        <input type="text" name="City" placeholder="City" value="{{ $comp->City }}" class="form-control" required>
                                        </div>
                                        <div class="col-md-3 mt-3">
                                        <label for="State"  class="form-label">State*</label>
                                        <input type="text" name="State" placeholder="State" value="{{ $comp->State }}" class="form-control" required>
                                        </div>
                                        <div class="col-md-3 mt-3">
                                            <label for="Zipcode"  class="form-label">Zipcode*</label>
                                            <input type="text" name="Zipcode" placeholder="Zipcode" value="{{ $comp->Zipcode }}" class="form-control" required>
                                        </div>
                                        <div class="col-md-3 mt-3">
                                            <label for="Country"  class="form-label">Country*</label>
                                            <input type="text" name="Country" placeholder="Country" value="{{ $comp->Country }}" class="form-control" required>
                                        </div>
                                        <div class="col-md-3 mt-3">
                                            <label for="BillingAddress1"  class="form-label">Billing Address 1</label>
                                            <input type="text" name="BillingAddress1" value="{{ $comp->BillingAddress1 }}" class="form-control" required>
                                        </div>
                                        <div class="col-md-3 mt-3">
                                            <label for="BillingAddress2"  class="form-label">Billing Address 2</label>
                                            <input type="text" name="BillingAddress2" value="{{ $comp->BillingAddress2 }}" class="form-control">
                                        </div>
                                        <div class="col-md-3 mt-3">
                                            <label for="BillingCity"  class="form-label">Billing City*</label>
                                            <input type="text" name="BillingCity" value="{{ $comp->BillingCity }}" class="form-control" required>
                                        </div>
                                        <div class="col-md-3 mt-3">
                                            <label for="BillingState"  class="form-label">Billing State*</label>
                                            <input type="text" name="BillingState" value="{{ $comp->BillingState }}" class="form-control" required>
                                        </div>
                                        <div class="col-md-3 mt-3">
                                            <label for="BillingZip"  class="form-label">Billing ZipCode</label>
                                            <input type="text" pattern="[0-9]{5}" name="BillingZip" value="{{ $comp->BillingZip }}" class="form-control" required>
                                        </div>
                                        <div class="col-md-3 mt-3">
                                            <label for="Phone1"  class="form-label">Phone 1*</label>
                                            <input type="text" name="Phone1" value="{{ $comp->Phone1 }}" class="form-control" required>
                                        </div>
                                        <div class="col-md-3 mt-3">
                                            <label for="Phone2"  class="form-label">Phone 2</label>
                                            <input type="text" name="Phone2" value="{{ $comp->Phone2 }}" class="form-control">
                                        </div>
                                        <div class="col-md-3 mt-3">
                                            <label for="Fax"  class="form-label">Fax</label>
                                            <input type="text" name="Fax"  value="{{ $comp->Fax }}" class="form-control">
                                        </div>
                                        <div class="form-group col-md-2 mt-3">
                                            <label class="form-label">Status</label>
                                            <select class="form-control" name="status">
                                            <option value="{{ $comp->status }}">{{ $comp->status }}</option>
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12 mt-3">
                                        <label for="Disclaimer"  class="form-label">Disclaimer</label>
                                        <Textarea rows="3" name="Disclaimer">{{ $comp->Disclaimer }}</Textarea>
                                        </div>
                                        <div class="col-md-3 mt-3">
                                        <label for="document"  class="form-label">Upload Document</label>
                                        <input type="file" name="document" class="form-control">
                                        <img src="{{ URL::asset('/images/'.$comp->document) }}" width="100px">
                                        </div>
                                        <div class="col-md-3 mt-3">
                                        <label for="logo"  class="form-label">Upload Image</label>
                                        <input type="file" name="logo" class="form-control">
                                        <img src="{{ URL::asset('/images/'.$comp->logo) }}" width="100px">
                                        </div>
                                    </div>
                                    <div class="mt-5">
                                        <button class="btn-primary btn" type="submit">Update</button>
                                       
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    @endsection