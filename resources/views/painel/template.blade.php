<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Sistema de Gestão de Armadores</title>
    <!-- Bootstrap -->
    <link href="{{ url('painel/vendors/bootstrap/dist/css/bootstrap.min.css') }}"
        rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ url('painel/vendors/font-awesome/css/font-awesome.min.css') }}"
        rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ url('painel/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="{{ url('painel/build/css/custom.min.css') }}" rel="stylesheet">
    <link href="{{ url('painel/css/style.css') }}" rel="stylesheet">
    <link href="{{ url('painel/css/responsive.css') }}" rel="stylesheet">
    @stack('css')
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            
            @include('painel.partials.sidebar-wrapper')

            <!-- top navigation -->
            @include('painel.partials.navegation')
            <!-- /top navigation -->

            <!-- page content -->
            @yield('main-content')
            <!-- /page content -->

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    Evaristo Paulo @ 2021 - Todos os direitos reservados
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>

    @include('painel.partials.modal')
    
    <!-- jQuery -->
    <script src="{{ url('painel/vendors/jquery/dist/jquery.min.js') }}"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
    <!-- Bootstrap -->
    <script src="{{ url('painel/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}">
    </script>
    <!-- FastClick -->
    <script src="{{ url('painel/vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ url('painel/vendors/nprogress/nprogress.js') }}"></script>
    <!-- jQuery custom content scroller -->
    <!-- jquery.inputmask -->
    <script src="{{ url('painel/vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js"
        integrity="sha512-AtJGnumoR/L4JbSw/HzZxkPbfr+XiXYxoEPBsP6Q+kNo9zh4gyrvg25eK2eSsp1VAEAP1XsMf2M984pK/geNXw=="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js"></script>
    @stack('js')
    <script src="{{ url('painel/build/js/custom.min.js') }}"></script>
    <script src="{{ url('painel/js/script.js') }}"></script>
    <script src="{{ url('painel/js/validator.js') }}"></script>
</body>

</html>
