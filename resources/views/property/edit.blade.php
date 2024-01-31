

@extends('layouts.app')

@section('content')
<div class="row">
                        <div class="col-lg-12">
                            <!-- Basic Card Example -->
                            <form action="{{ route('update.prop', $prop->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Update Property</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="form-label">Owner Type</label>
                                            <select class="form-control" name="OwnerType">
                                            <option value="{{$prop->OwnerType}}">{{$prop->OwnerType}}</option>
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                            </select>
                                        </div>
                                        </div>
                                        <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="form-label">Owner</label>
                                            <select class="form-control" name="Owner">
                                            <option value="{{$prop->Owner}}">{{$prop->Owner}}</option>
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                            </select>
                                        </div>
                                        </div>
                                        <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="form-label">Property Type</label>
                                            <select class="form-control" name="ProtpertyType">
                                            <option value="{{$prop->ProtpertyType}}">{{$prop->ProtpertyType}}</option>
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                            </select>
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                        <label for="PropertyName"  class="form-label">Property Name*</label>
                                        <input type="text" name="PropertyName" placeholder="PropertyName" value="{{$prop->PropertyName}}" class="form-control">
                                        </div>
                                        <div class="col-md-4 mt-3">
                                        <label for="Location"  class="form-label">Location*</label>
                                        <input type="text" name="Location" placeholder="Location" value="{{$prop->Location}}" class="form-control" required>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                        <label for="PropertyDiscription"  class="form-label">Property Discription*</label>
                                        <input type="text" name="PropertyDiscription" placeholder="Property Discription" value="{{$prop->PropertyDiscription}}" class="form-control" required>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <label for="LandInformation"  class="form-label">Land Information(sq Mtrs)*</label>
                                            <input type="text" name="LandInformation" placeholder="Land Information(sq Mtrs)" value="{{$prop->LandInformation}}" class="form-control" required>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <label for="Tenure"  class="form-label">Tenure</label>
                                            <input type="text" name="Tenure" placeholder="Tenure" value="{{$prop->Tenure}}" class="form-control" >
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <label for="Builder"  class="form-label">Builder</label>
                                            <input type="text" name="Builder" placeholder="Builder" value="{{$prop->Builder}}" class="form-control" >
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <label for="Architecture"  class="form-label">Architecture</label>
                                            <input type="text" name="Architecture" placeholder="Architecture" value="{{$prop->Architecture}}" class="form-control">
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <label for="CertifyingAuthority"  class="form-label">Certifying Authority*</label>
                                            <input type="text" name="CertifyingAuthority" placeholder="Certifying Authority" value="{{$prop->CertifyingAuthority}}" class="form-control">
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <label for="Contact"  class="form-label">Contact</label>
                                            <input type="text"  placeholder="Conatct" name="Contact" value="{{$prop->Contact}}" class="form-control" >
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <label for="ReciptePrefix"  class="form-label">Recipte Prefix</label>
                                            <input type="text" name="ReciptePrefix" placeholder="Recipte Prefix" value="{{$prop->ReciptePrefix}}" class="form-control" >
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <label for="ServiceFee"  class="form-label">Service Fee (in per%)</label>
                                            <input type="text" name="ServiceFee" placeholder="Service Fee (in per%)" value="{{$prop->ServiceFee}}" class="form-control" >
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <label for="Zone"   class="form-label">Zone</label>
                                            <input type="text" name="Zone" placeholder="Zone" value="{{$prop->Zone}}"  class="form-control">
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <label for="Sector"  class="form-label">Sector</label>
                                            <input type="text" name="Sector" value="{{$prop->Sector}}" class="form-control">
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <label for="PlotNo"  class="form-label">Plot No*</label>
                                            <input type="text" name="PlotNo" placeholder="Plot No" value="{{$prop->PlotNo}}" class="form-control" required>
                                        </div>
                                        <br />
                                        <div class="col-md-4 mt-3">
                                        <label for="map"  class="form-label">Site Map</label>
                                        <input type="file" name="map" class="form-control">
                                        <img src="{{ URL::asset('/images/'.$prop->map) }}" width="100px">
                                        </div>
                                        <div class="col-md-4 mt-3">
                                        <label for="brochure"  class="form-label">Property Brochure</label>
                                        <input type="file" name="brochure" class="form-control">
                                        <img src="{{ URL::asset('/images/'.$prop->brochure) }}" width="100px">
                                        </div>
                                        <div class="col-md-4 mt-3">
                                        <label for="image"  class="form-label">Property Image</label>
                                        <input type="file" name="image" class="form-control">
                                        <img src="{{ URL::asset('/images/'.$prop->image) }}" width="100px">
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