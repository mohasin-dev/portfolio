@extends('layouts.backend.app')

@section('title','study')

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
                          Edit study
                        </h2>
                    </div>
                    <div class="body">
                        <form action="{{ route('admin.study.update',$study->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="name" class="form-control" name="exam_title">
                                    <label class="form-label">Exam Name</label>
                                </div>
                                <div class="form-line">
                                    <input type="text" id="name" class="form-control" name="description">
                                    <label class="form-label">Short Description (Maximum 190 character)</label>
                                </div>
                                <div class="form-line">
                                    <input type="text" id="name" class="form-control" name="session_start">
                                    <label class="form-label">Session Start</label>
                                </div>
                                <div class="form-line">
                                    <input type="number" id="name" class="form-control" name="session_end">
                                    <label class="form-label">Session End</label>
                                </div>
                            </div>
                            <a  class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.study.index') }}">BACK</a>
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