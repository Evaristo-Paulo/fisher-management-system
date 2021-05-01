@extends('painel.template')
<!-- page content -->
@section('main-content')
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Formulário de Actualização |<small>Usuários</small></h2>
                        <div class="clearfix"></div>
                        @if( session('password-different') )
                            <ul class="alert alert-warning animated fadeInDown" role="alert">
                                <li><i class="fa fa-warning"></i> {{ session('password-different') }}</li>
                            </ul>
                        @endif
                        @if( session('create-auth') )
                            <ul class="alert alert-warning animated fadeInDown" role="alert">
                                <li><i class="fa fa-warning"></i> {{ session('create-auth') }}</li>
                            </ul>
                        @endif
                        @if( session('update-auth') )
                            <ul class="alert alert-warning animated fadeInDown" role="alert">
                                <li><i class="fa fa-warning"></i> {{ session('update-auth') }}</li>
                            </ul>
                        @endif
                        @if( session('user-not-found') )
                            <ul class="alert alert-warning animated fadeInDown" role="alert">
                                <li><i class="fa fa-warning"></i> {{ session('user-not-found') }}</li>
                            </ul>
                        @endif
                        @if( session('error') )
                            <ul class="alert alert-warning animated fadeInDown" role="alert">
                                <li><i class="fa fa-warning"></i> {{ session('error') }}</li>
                            </ul>
                        @endif
                        @if( session('error-exception') )
                            <ul class="alert alert-warning animated fadeInDown" role="alert">
                                <li><i class="fa fa-warning"></i> {{ session('error-exception') }}</li>
                            </ul>
                        @endif
                        @if( session('password-changed') )
                            <ul class="alert alert-success animated fadeInDown" role="alert">
                                <li><i class="fa fa-check"></i> {{ session('password-changed') }}</li>
                            </ul>
                        @endif
                        @if( session('warning') )
                            <ul class="alert alert-warning animated fadeInDown" role="alert">
                                <li><i class="fa fa-warning"></i> {{ session('warning') }}</li>
                            </ul>
                        @endif
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <div class="x_content">
                        <br />
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
                            method="POST" action="{{ route('user.edit', $user->id ) }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @method('PUT')
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Nome
                                    Completo
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="name" minlength="3" name="name" required="required"
                                        value="{{ $user->name }}" class="form-control ">
                                </div>
                            </div>
                            <div class="form-group item">
                                <label class="col-md-3 col-sm-3  label-align">Gênero <span class="required">*</span>
                                </label>
                                <div class="col-md-9 col-sm-9 ">
                                    @foreach( $genders as $index => $value )
                                        <div class="checkbox">
                                            <label for="{{ $value->type }}">
                                                @if($value->id == $user->gender_id)
                                                    <input type="radio" class="flat" checked="checked"
                                                        id="{{ $value->type }}" name="gender"
                                                        value="{{ $value->id }}">
                                                    {{ $value->type }}
                                                @else
                                                    <input type="radio" class="flat" id="{{ $value->type }}"
                                                        name="gender" value="{{ $value->id }}">
                                                    {{ $value->type }}
                                                @endif
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="email" id="email" name="email" required="required" class="form-control"
                                        value="{{ $user->email  }}">
                                </div>
                            </div>
                            @if(Auth::user()->id != $user->id)
                                <div class="form-group item">
                                    <label class="col-md-3 col-sm-3  label-align">Role <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 ">
                                        @foreach( $roles as $index => $value )
                                            <div class="checkbox">
                                                <label for="{{ $value->type }}">
                                                    @if( in_array($user->id, $roles_users->where('role_id', $value->id)->pluck('user_id')->toArray()))
                                                        <input type="checkbox" class="flat" checked="checked"
                                                            id="{{ $value->type }}" name="role[]"
                                                            value="{{ $value->type }}" >
                                                        {{ $value->type }}
                                                    @else
                                                        <input type="checkbox"  class="flat" id="{{ $value->type }}"
                                                            name="role[]" value="{{ $value->type }}">
                                                        {{ $value->type }}
                                                    @endif
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @else
                            <div class="form-group item">
                                <label class="col-md-3 col-sm-3  label-align">Role <span class="required">*</span>
                                </label>
                                <div class="col-md-9 col-sm-9 ">
                                    @foreach( $roles as $index => $value )
                                        <div class="checkbox">
                                            <label for="{{ $value->type }}">
                                                @if( in_array($user->id, $roles_users->where('role_id', $value->id)->pluck('user_id')->toArray()))
                                                    <input type="hidden" class="flat" checked="checked"
                                                        id="{{ $value->type }}" name="role[]"
                                                        value="{{ $value->type }}" >
                                                    {{ $value->type }}
                                                @else
                                                    <input type="hidden"  class="flat" id="{{ $value->type }}"
                                                        name="role[]" value="{{ $value->type }}">
                                                    {{ $value->type }}
                                                @endif
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                            <div class="form-group item">
                                <label class="col-form-label col-md-3 col-sm-3 label-align"
                                    for="photo">Fotografia</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="file" id="photo" name="photo"
                                        class="form-control " value="{{ old('photo') }}">
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button type="submit" class="btn btn-success">Enviar</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /page content -->


@endsection

@section('menu-sidebar')
@include('painel.partials.sidebar')
@endsection

@push('css')
    <link href="{{ url('painel/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ url('painel/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
    <link href="{{ url('painel/vendors/select2/dist/css/select2.min.css') }}"
        rel="stylesheet">
    <link href="{{ url('painel/vendors/switchery/dist/switchery.min.css') }}"
        rel="stylesheet">
    <link href="{{ url('painel/vendors/starrr/dist/starrr.css') }}" rel="stylesheet">
    <link href="{{ url('painel/vendors/bootstrap-daterangepicker/daterangepicker.css') }}"
        rel="stylesheet">

@endpush

@push('js')
    <script src="{{ url('painel/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js') }}">
    </script>
    <script src="{{ url('painel/vendors/iCheck/icheck.min.js') }}"></script>
    <script
        src="{{ url('painel/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}">
    </script>
    <!-- iCheck -->
    <script src="{{ url('painel/vendors/moment/min/moment.min.js') }}"></script>
    <script src="{{ url('painel/vendors/bootstrap-daterangepicker/daterangepicker.js') }}">
    </script>
    <!-- bootstrap-wysiwyg -->
    <script src="{{ url('painel/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js') }}">
    </script>
    <script src="{{ url('painel/vendors/jquery.hotkeys/jquery.hotkeys.js') }}"></script>
    <script src="{{ url('painel/vendors/google-code-prettify/src/prettify.js') }}"></script>
    <!-- jQuery Tags Input -->
    <script src="{{ url('painel/vendors/jquery.tagsinput/src/jquery.tagsinput.js') }}">
    </script>
    <!-- Switchery -->
    <script src="{{ url('painel/vendors/switchery/dist/switchery.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ url('painel/vendors/select2/dist/js/select2.full.min.js') }}"></script>
    <!-- Parsley -->
    <script src="{{ url('painel/vendors/autosize/dist/autosize.min.js') }}"></script>
    <!-- jQuery autocomplete -->
    <script
        src="{{ url('painel/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js') }}">
    </script>
    <!-- starrr -->
    <script src="{{ url('painel/vendors/starrr/dist/starrr.js') }}"></script>
    <!-- Custom Theme Scripts -->

@endpush
