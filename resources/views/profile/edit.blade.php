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
                        <form action="{{ route('admin.profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group form-float">
                                <div class="form-line">
                                <input type="text" id="title" class="form-control" name="name" value="{{$user->name}}">
                                    <label class="form-label">Name</label>
                                </div>
                                <div class="form-line">
                                    <input type="text" id="name" class="form-control" name="email" value="{{$user->email}}">
                                    <label class="form-label">Email</label>
                                </div>
                                <div class="form-line">
                                    <input type="text" id="name" class="form-control" name="email2" value="{{$user->email2}}">
                                    <label class="form-label">Second Email(Optional)</label>
                                </div>
                                <div class="form-line">
                                    <input type="text" id="name" class="form-control" name="designation" value="{{$user->designation}}">
                                    <label class="form-label">Designation</label>
                                </div>
                                <div class="form-line">
                                    <input type="text" id="name" class="form-control" name="contact1" value="{{$user->contact1}}">
                                    <label class="form-label">Contact Number</label>
                                </div>
                                <div class="form-line">
                                    <input type="text" id="name" class="form-control" name="contact2" value="{{$user->contact2}}">
                                    <label class="form-label">Second Contact Number (Optional)</label>
                                </div>
                                <div class="form-line">
                                    <textarea id="tinymce" name="address">{{$user->address}}</textarea>
                                   
                                </div>
                                <div class="form-line">
                                    <textarea id="tinymce" name="about_me">{{$user->about_me}}</textarea>
                                    
                                </div>
                                <div class="form-line">
                                    <textarea id="tinymce" name="about_skill">{{$user->about_skill}}</textarea>
                                    
                                </div>
                                <div class="form-line">
                                    <textarea id="tinymce" name="about_service">{{$user->about_service}}</textarea>
                                    
                                </div>
                                <div class="form-line">
                                    <textarea id="tinymce" name="about_quality">{{$user->about_quality}}</textarea>
                                    
                                </div>
                                <div class="form-line">
                                    <input type="text" id="name" class="form-control" name="website1" value="{{$user->website1}}">
                                    <label class="form-label">Website1</label>
                                </div>
                                <div class="form-line">
                                    <input type="text" id="name" class="form-control" name="website2" value="{{$user->website2}}">
                                    <label class="form-label">Website2</label>
                                </div>
                                <div class="form-line">
                                    <input type="file" id="name" class="form-control" name="avatar">
                                    {{-- <label class="form-label">Image</label> --}}
                                </div>
                            </div>
                            <a  class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.profile.index') }}">BACK</a>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
<!-- Select Plugin Js -->
<script src="{{ asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
<!-- TinyMCE -->
<script src="{{ asset('assets/backend/plugins/tinymce/tinymce.js') }}"></script>
<script>
    $(function () {
        //TinyMCE
        tinymce.init({
            selector: "textarea#tinymce",
            theme: "modern",
            height: 300,
            plugins: [
                'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen',
                'insertdatetime media nonbreaking save table contextmenu directionality',
                'emoticons template paste textcolor colorpicker textpattern imagetools'
            ],
            toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            toolbar2: 'print preview media | forecolor backcolor emoticons',
            image_advtab: true
        });
        tinymce.suffix = ".min";
        tinyMCE.baseURL = '{{ asset('assets/backend/plugins/tinymce') }}';
    });
</script>
@endpush