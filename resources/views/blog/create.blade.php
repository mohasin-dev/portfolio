@extends('layouts.backend.app')

@section('title','blog')

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
                           ADD NEW blog
                        </h2>
                    </div>
                    <div class="body">
                        <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="title" class="form-control" name="title">
                                    <label class="form-label">Title</label>
                                </div>
                                <div class="form-line">
                                    <input type="text" id="name" class="form-control" name="description">
                                    <label class="form-label">Description</label>
                                </div>
                                <div class="form-line">
                                    <input type="file" id="name" class="form-control" name="image">
                                    {{-- <label class="form-label">Image</label> --}}
                                </div>
                            </div>

                            <a  class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.blog.index') }}">BACK</a>
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