@extends('layouts.backend.app')

@section('title','social link')

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
                           ADD NEW social link
                        </h2>
                    </div>
                    <div class="body">
                        <form action="{{ route('admin.social-link.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="name" class="form-control" name="name">
                                    <label class="form-label">Social Link Name</label>
                                </div>
                                <div class="form-line">
                                    <input type="text" id="name" class="form-control" name="icon">
                                    <label class="form-label">Social Link Font Awesome Icon Code</label>
                                </div>
                                <div class="form-line">
                                    <input type="text" id="name" class="form-control" name="url" value="www.">
                                    <label class="form-label">Social Link URL</label>
                                </div>
                            </div>
                            <a  class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.social-link.index') }}">BACK</a>
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