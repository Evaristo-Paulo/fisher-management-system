@extends('painel.template')
@section('main-content')
<!-- page content -->
@section('main-content')
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Formulário de Actualização |<small>Armadores</small></h2>
                        <div class="clearfix"></div>
                        @if( session('password-different') )
                            <ul class="alert alert-warning animated fadeInDown" role="alert">
                                <li><i class="fa fa-warning"></i> {{ session('password-different') }}</li>
                            </ul>
                        @endif
                        @if( session('update-auth') )
                            <ul class="alert alert-warning animated fadeInDown" role="alert">
                                <li><i class="fa fa-warning"></i> {{ session('update-auth') }}</li>
                            </ul>
                        @endif
                        @if( session('create-auth') )
                            <ul class="alert alert-warning animated fadeInDown" role="alert">
                                <li><i class="fa fa-warning"></i> {{ session('create-auth') }}</li>
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
                        @if( session('created') )
                            <ul class="alert alert-success animated fadeInDown" role="alert">
                                <li><i class="fa fa-check"></i> {{ session('created') }}</li>
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
                        <div id="wizard" class="form_wizard wizard_horizontal">
                            <ul class="wizard_steps">
                                <li>
                                    <a href="#step-1">
                                        <span class="step_no">1</span>
                                        <span class="step_descr">
                                            Passo 1<br />
                                            <small>Dados pessoais</small>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#step-2">
                                        <span class="step_no">2</span>
                                        <span class="step_descr">
                                            Passo 2<br />
                                            <small>Contacto/Local de nascimento</small>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#step-3">
                                        <span class="step_no">3</span>
                                        <span class="step_descr">
                                            Passo 3<br />
                                            <small>Tipo de armador/Fotografia</small>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                            <form class="form-horizontal form-label-left" data-parsley-validate id="form" method="POST"
                                action="{{ route('fisher.edit', $fisher->id ) }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @method('PUT')

                                <div id="step-1">
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align"
                                            for="fisherType">Tipo de Armador <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <select class="select2_single form-control" tabindex="-1" required="required" id="fisherType"
                                                name="fisherType">
                                                <option value="" disabled>Selecionar tipo de armador</option>
                                                @foreach ($fisherTypes as $type )
                                                @if($type->type == $fisher->fisher_type)
                                                <option value="{{  $type->id }}" selected>{{ $type->type }}</option>
                                                @else
                                                <option value="{{  $type->id }}">{{ $type->type }}</option>
                                                    
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">
                                            Nome <span id="text-entity">da Entidade</span><span id="text-owned">do Proprietário</span><span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" id="name" required="required" value="{{ $fisher->name }}" minlength="3" class="form-control  "
                                                name="name">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align"
                                            for="birthday">Data de Nascimento
                                            <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input id="birthday" class="date-picker form-control" value="{{ $fisher->birthday }}" name="birthday"
                                                placeholder="dd-mm-yyyy" type="text" required="required" type="text"
                                                onfocus="this.type='date'" onmouseover="this.type='date'"
                                                onclick="this.type='date'" onblur="this.type='text'"
                                                onmouseout="timeFunctionLong(this)">
                                            <script>
                                                function timeFunctionLong(input) {
                                                    setTimeout(function () {
                                                        input.type = 'text';
                                                    }, 60000);
                                                }

            
                                            </script>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="bi" class="col-form-label col-md-3 col-sm-3 label-align">
                                            <span id="text-bi">Nº BI</span><span id="text-nif">NIF</span>  <span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input id="bi" class="form-control col" data-inputmask="'mask' : '999999999AA999'" value="{{ $fisher->bi }}" required="required" type="text" name="bi">
                                        </div>
                                    </div>
                                    <div class="form-group item">
                                        <label class="col-md-3 col-sm-3  label-align">Gênero <span class="required">*</span>
                                        </label>
                                        <div class="col-md-9 col-sm-9 ">
                                            @foreach( $genders as $index => $value )
                                                <div class="checkbox">
                                                    <label for="{{ $value->type }}">
                                                        @if($value->type == $fisher->gender)
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
                                </div>
                                <div id="step-2">
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email <span class="required"></span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="email" id="email" name="email" value="{{ $fisher->email }}" 
                                                class="form-control ">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align"
                                            for="phone">Telefone <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="tel" id="phone" data-inputmask="'mask' : '(+244)-\\999-999-999'" name="phone" value="{{   $fisher->phone }}" required="required"
                                                class="form-control ">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align"
                                            for="municipe">Município <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <select class="select2_single form-control" tabindex="-1" id="municipe"
                                                name="municipe">
                                                <option value="" disabled selected required="required">Aguardando campo província ...</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align"
                                            for="province">Província <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <select class="select2_single form-control" tabindex="-1" required="required" id="province"
                                                name="province">
                                                <option value="" disabled selected>Selecionar província</option>
                                                @foreach ($provinces as $province )
                                                    <option value="{{  $province->id }}">{{ $province->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div id="step-3">
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align"
                                            for="photo">Fotografia</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="file" id="photo" name="photo"
                                                class="form-control " value="{{ old('photo') }}">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- End SmartWizard Content -->

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
    <script>
        var fisherType = document.querySelector('#fisherType');
        var textoBI = document.querySelector('#text-bi');
        var textoNIF = document.querySelector('#text-nif');
        var textoEntity = document.querySelector('#text-entity');
        var textoOwned = document.querySelector('#text-owned');
        var fisherTypeID =  fisherType.value
            console.log('Estou aqui')
            if ( fisherTypeID == 1 ){
                console.log('Colectivo')
                textoBI.style.display = "none"
                textoNIF.style.display = "inline"
                textoEntity.style.display = "none"
                textoOwned.style.display = "inline"
            }else{
                console.log('Singular')
                textoBI.style.display = "inline"
                textoNIF.style.display = "none"
                textoEntity.style.display = "inline"
                textoOwned.style.display = "none"
            }
        fisherType.addEventListener('change', (e)=>{
            var fisherTypeID =  e.target.value
            if ( fisherTypeID == 1 ){
                console.log('Colectivo')
                textoBI.style.display = "none"
                textoNIF.style.display = "inline"
                textoEntity.style.display = "none"
                textoOwned.style.display = "inline"
            }else{
                console.log('Singular')
                textoBI.style.display = "inline"
                textoNIF.style.display = "none"
                textoEntity.style.display = "inline"
                textoOwned.style.display = "none"
            }
        });
    </script>

@endpush
