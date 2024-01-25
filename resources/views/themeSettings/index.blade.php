@extends('layouts.backend.app')

@section('title','Admin Profile')

@push('css')
   <style>
       a.btn.btn-success.waves-effect.pull-right{
           margin-left: 10px;
       }
   </style>
@endpush

@section('content')
    <div class="container-fluid">
        <!-- Vertical Layout | With Floating Label -->
    <a href="{{ route('admin.dashboard') }}" class="btn btn-danger waves-effect">BACK</a>
            <a href="{{ route('admin.settings.edit', $setting->id) }}" class="btn btn-success waves-effect pull-right">Customize Theme Settings
                {{-- <i class="material-icons">done</i> --}}
                {{-- <span>Change Password</span> --}}
            </a> 
  
        <br>
        <br>
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                        <h3>
                                            {{$setting->id}}
                                        </h3>
                                        {{$setting->id}}
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12" style="border-left: 1px solid #ccc;">
                                    {{-- <p>{{$admin->address}}</p>
                                    <p>{{$admin->website}}</p>
                                    <p>{{$admin->email}}</p>
                                    <p>{{$admin->email2}}</p>
                                    <p>{{$admin->contact1}} | {{$admin->contact2}}</p> --}}
                                </div>
                            </div>
                        </div>
                        <div class="body">
                            {{-- <h5>About Me:</h5>
                            {{$admin->about_me}}<br><br>
                            <h5>About My Skill:</h5>
                            {{$admin->about_skill}}
                            <h5>About My Service:</h5>
                            {{$admin->about_service}}
                            <h5>Why Hire Me:</h5>
                            {{$admin->about_quality}} --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <div class="card"> <!--bg-amber -->
                        <div class="header bg-cyan">
                            <h2>
                                Theme Logo
                            </h2>
                        </div>
                        <div class="body">
                            <img class="img-responsive thumbnail" src="{{ asset('storage/logo/'.$setting->logo) }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection

@push('js')
    <!-- Jquery DataTable Plugin Js -->
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>

    <script src="{{ asset('assets/backend/js/pages/tables/jquery-datatable.js') }}"></script>
    <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
    <script type="text/javascript">
        function deleteProduct(id) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>
@endpush