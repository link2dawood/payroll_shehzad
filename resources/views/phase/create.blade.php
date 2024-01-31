

@extends('layouts.app')

@section('content')
<div class="row">
                        <div class="col-lg-12">
                            <!-- Basic Card Example -->
                            <form action="{{ route('store.phase') }}" method="post" enctype="multipart/form-data">
                                @csrf
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Create Phase</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="form-label">Owner Type</label>
                                            <select class="form-control" name="OwnerType" required>
                                            <option value="">Select One</option>
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                            </select>
                                        </div>
                                        </div>
                                        <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="form-label">Owner</label>
                                            <select class="form-control" name="Owner" required>
                                            <option value="">Select One</option>
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                            </select>
                                        </div>
                                        </div>
                                        <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="form-label">Property Type</label>
                                            <select class="form-control" name="ProtpertyType" required>
                                            <option value="">Select One</option>
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                            </select>
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                        <label for="PhaseName"  class="form-label">Name of Phase*</label>
                                        <input type="text" name="PhaseName" placeholder="Phase Name" class="form-control" required>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                        <label for="PhaseDescription"  class="form-label">Phase Description*</label>
                                        <input type="text" name="PhaseDescription" placeholder="Phase Description" class="form-control" required>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <label for="ServiceFee"  class="form-label">Service Fee (in per%)</label>
                                            <input type="text" name="ServiceFee" placeholder="Service Fee (in per%)" class="form-control" >
                                        </div>
                                        <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label">Property Sub Type*</label>
                                            <select class="form-control" name="ProtpertySubType" required>
                                            <option value="">Select One</option>
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                            </select>
                                        </div>
                                        </div>
                                        
                                        <br />
                                        <div class="col-md-4 mt-3">
                                        <label for="map"  class="form-label">Site Map</label>
                                        <input type="file" name="map" class="form-control">
                                        </div>
                                        <div class="col-md-4 mt-3">
                                        <label for="brochure"  class="form-label">Phase Brochure</label>
                                        <input type="file" name="brochure" class="form-control">
                                        </div>
                                        <div class="col-md-4 mt-3">
                                        <label for="image"  class="form-label">Upload Phase Image</label>
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