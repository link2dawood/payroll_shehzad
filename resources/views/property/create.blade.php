

@extends('layouts.app')

@section('content')
<div class="row">
                        <div class="col-lg-12">
                            <!-- Basic Card Example -->
                            <form action="{{ route('store.prop') }}" method="post" enctype="multipart/form-data">
                                @csrf
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Create Property</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="form-label">Owner Type</label>
                                            <select class="form-control" name="OwnerType">
                                            <option value="">Select One</option>
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                            </select>
                                        </div>
                                        </div>
                                        <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="form-label">Owner</label>
                                            <select class="form-control" name="Owner">
                                            <option value="">Select One</option>
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                            </select>
                                        </div>
                                        </div>
                                        <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="form-label">Property Type</label>
                                            <select class="form-control" name="ProtpertyType">
                                            <option value="">Select One</option>
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                            </select>
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                        <label for="PropertyName"  class="form-label">Property Name*</label>
                                        <input type="text" name="PropertyName" placeholder="PropertyName" class="form-control">
                                        </div>
                                        <div class="col-md-4 mt-3">
                                        <label for="Location"  class="form-label">Location*</label>
                                        <input type="text" name="Location" placeholder="Location" class="form-control" required>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                        <label for="PropertyDiscription"  class="form-label">Property Discription*</label>
                                        <input type="text" name="PropertyDiscription" placeholder="Property Discription" class="form-control" required>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <label for="LandInformation"  class="form-label">Land Information(sq Mtrs)*</label>
                                            <input type="text" name="LandInformation" placeholder="Land Information(sq Mtrs)" class="form-control" required>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <label for="Tenure"  class="form-label">Tenure</label>
                                            <input type="text" name="Tenure" placeholder="Tenure" class="form-control" >
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <label for="Builder"  class="form-label">Builde</label>
                                            <input type="text" name="Builder" placeholder="Tenure" class="form-control" >
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <label for="Architecture"  class="form-label">Architecture</label>
                                            <input type="text" name="Architecture" placeholder="Architecture" class="form-control">
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <label for="CertifyingAuthority"  class="form-label">Certifying Authority*</label>
                                            <input type="text" name="CertifyingAuthority" placeholder="Certifying Authority" class="form-control">
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <label for="Contact"  class="form-label">Contact</label>
                                            <input type="text"  placeholder="Conatct" name="Contact" class="form-control" >
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <label for="ReciptePrefix"  class="form-label">Recipte Prefix</label>
                                            <input type="text" name="ReciptePrefix" placeholder="Recipte Prefix" class="form-control" >
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <label for="ServiceFee"  class="form-label">Service Fee (in per%)</label>
                                            <input type="text" name="ServiceFee" placeholder="Service Fee (in per%)" class="form-control" >
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <label for="Zone"   class="form-label">Zone</label>
                                            <input type="text" name="Zone" placeholder="Zone"  class="form-control">
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <label for="Sector"  class="form-label">Sector</label>
                                            <input type="text" name="Sector" class="form-control">
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <label for="PlotNo"  class="form-label">Plot No*</label>
                                            <input type="text" name="PlotNo" placeholder="Plot No" class="form-control" required>
                                        </div>
                                        <br />
                                        <div class="col-md-4 mt-3">
                                        <label for="map"  class="form-label">Site Map</label>
                                        <input type="file" name="map" class="form-control">
                                        </div>
                                        <div class="col-md-4 mt-3">
                                        <label for="brochure"  class="form-label">Property Brochure</label>
                                        <input type="file" name="brochure" class="form-control">
                                        </div>
                                        <div class="col-md-4 mt-3">
                                        <label for="image"  class="form-label">Property Image</label>
                                        <input type="file" name="image" class="form-control">
                                        </div>
                                    </div>
                                    <div class="mt-5">
                                        <button class="btn-primary btn" type="submit">Save</button>
                                        <button class="btn-secondary btn" type="reset">Cancel</button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    @endsection