<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SGA - Sistema de Gestão de Armadores </title>
    <link href="{{ url('painel/vendors/bootstrap/dist/css/bootstrap.min.css') }}"
        rel="stylesheet">
    <link href="{{ url('painel/vendors/font-awesome/css/font-awesome.min.css') }}"
        rel="stylesheet">
    <link href="{{ url('painel/css/style.css') }}" rel="stylesheet">
    <link href="{{ url('painel/css/responsive.css') }}" rel="stylesheet">

    <style>
        body {
            height: 100vh
        }

    </style>
</head>

<body>
    <div class="box-login">
        <div class="cover-img">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR32uCGRom_dxfZeS49f_2VeEv43uhWfQez7A&usqp=CAU"
                alt="">
        </div>

        <div class="wrapper_login">
            <div class="title-login">
                <h2>Sistema de Gestão de Armadores</h2>
            </div>
            @if( session('error') )
                <ul class="alert alert-danger " role="alert">
                    <li><i class="fa fa-close"></i> {{ session('error') }}</li>
                </ul>
            @endif
            @if( session('warning') )
                <ul class="alert alert-warning " role="alert">
                    <li><i class="fa fa-warning"></i> {{ session('warning') }}</li>
                </ul>
            @endif
            <form action="{{ route('login') }}" method="POST" id="login-validator">
                {{ csrf_field() }}
                <div>
                    <input type="email" id="email" required="required" name="email" class="form-control"
                        value="{{ old('email') }}" placeholder="Email" required="" />
                </div>
                <div>
                    <input type="password" id="password" required="required" name="password" class="form-control" placeholder="Senha" required="" />
                </div>
                <div>
                    <button class="btn submit w-100 text-white">Login</button>
                </div>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>


    <script src="{{ url('painel/vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ url('painel/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}">
    </script>
    <!-- FastClick -->
    <script src="{{ url('painel/vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ url('painel/vendors/nprogress/nprogress.js') }}"></script>
    <!-- jQuery custom content scroller -->
    @stack('js')
    <script src="{{ url('painel/build/js/custom.min.js') }}"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
    <script src="{{ url('painel/js/validator.js') }}"></script>

    <script>
        setTimeout(() => {
            $('.wrapper_login .alert').alert('close').removeClass("fadeInDown").addClass(" fadeOutDown");
        }, 3000); //depois de 3 segundos

    </script>

</body>

</html>
