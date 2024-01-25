@extends('layouts.backend.app')

@section('title','service')

@push('css')

@endpush

@section('content')
    <div class="container-fluid">
        <!-- Vertical Layout | With Floating Label -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                           ADD NEW Service
                        </h2>
                    </div>
                    <div class="body">
                        <form action="{{ route('admin.service.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="name" class="form-control" name="service_name">
                                    <label class="form-label">service Name</label>
                                </div>
                                <div class="form-line">
                                    <input type="text" id="name" class="form-control" name="short_description">
                                    <label class="form-label">Short Description (Maximum 100 characters)</label>
                                </div>
                                <div class="form-line">
                                    <input type="text" id="name" class="form-control" name="service_icon">
                                    <label class="form-label">Service Front Awesome Icon (fa fa-pen)</label>
                                </div>
                            </div>

                            <a  class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.service.index') }}">BACK</a>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')

@endpush