@extends('layouts.backend.app')

@section('title','counter')

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
                          Edit counter
                        </h2>
                    </div>
                    <div class="body">
                        <form action="{{ route('admin.counter.update',$counter->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group form-float">
                                <div class="form-line">
                                <input type="text" id="name" class="form-control" name="title" value="{{$counter->title}}">
                                    <label class="form-label">Title</label>
                                </div>
                                <div class="form-line">
                                    <input type="number" id="name" class="form-control" name="amount" value="{{$counter->amount}}">
                                    <label class="form-label">Total Amount</label>
                                </div>
                            </div>
                 
                            <a  class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.counter.index') }}">BACK</a>
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