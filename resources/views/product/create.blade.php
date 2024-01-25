@extends('layouts.backend.app')

@section('title','Category')

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
                           ADD NEW PRODUCT
                        </h2>
                    </div>
                    <div class="body">
                        <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="title" class="form-control" name="title">
                                    <label class="form-label">Title</label>
                                </div>
                                <div class="form-line">
                                    <select class="form-control show-tick" name="category_id">
                                        @foreach ($categories as $category)
                                        <option>Select a category</option>
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    {{-- <label class="form-label">Category</label> --}}
                                </div>
                                <div class="form-line">
                                    <input type="text" id="name" class="form-control" name="url" value="www.">
                                    <label class="form-label">URL</label>
                                </div>
                                <div class="form-line">
                                    <input type="file" id="name" class="form-control" name="image">
                                    {{-- <label class="form-label">Image</label> --}}
                                </div>
                            </div>

                            <a  class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.product.index') }}">BACK</a>
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