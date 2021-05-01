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
                        <h2>Listagem |<small>User</small></h2>
                        <div class="clearfix"></div>
                        <div id="tablePDF" class="btn-export" style="width: 30px; margin: 10px 0; cursor: pointer" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Exportar PDF">
                            <img src="{{ url('painel/build/images/pdf.png') }}" alt="exportar-pdf">
                        </div>
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
                        @if( session('edit-auth') )
                            <ul class="alert alert-warning animated fadeInDown" role="alert">
                                <li><i class="fa fa-warning"></i> {{ session('edit-auth') }}</li>
                            </ul>
                        @endif
                        @if( session('delete-auth') )
                            <ul class="alert alert-warning animated fadeInDown" role="alert">
                                <li><i class="fa fa-warning"></i> {{ session('delete-auth') }}</li>
                            </ul>
                        @endif
                        @if( session('warning') )
                            <ul class="alert alert-warning animated fadeInDown" role="alert">
                                <li><i class="fa fa-warning"></i> {{ session('warning') }}</li>
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
                        @if( session('password-different') )
                            <ul class="alert alert-warning animated fadeInDown" role="alert">
                                <li><i class="fa fa-warning"></i> {{ session('password-different') }}</li>
                            </ul>
                        @endif
                        @if( session('updated') )
                            <ul class="alert alert-success animated fadeInDown" role="alert">
                                <li><i class="fa fa-check"></i> {{ session('updated') }}</li>
                            </ul>
                        @endif
                        @if( session('deleted') )
                            <ul class="alert alert-success animated fadeInDown" role="alert">
                                <li><i class="fa fa-check"></i> {{ session('deleted') }}</li>
                            </ul>
                        @endif
                        @if( session('password-changed') )
                            <ul class="alert alert-success animated fadeInDown" role="alert">
                                <li><i class="fa fa-check"></i> {{ session('password-changed') }}</li>
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
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">

                                    <table id="datatable-responsive"
                                        class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                                        width="100%">
                                        <thead>
                                            <tr>
                                                <th>Nome</th>
                                                <th>Gênero</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th class="option-title">Opção</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($users as $key => $user)
                                                <tr>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $genders->where('id', $user->gender_id)->first()->type }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>
                                                        @foreach ( $roles_users->where('user_id', $user->id)->pluck('role_id')->toArray() as $role_user )
                                                            @foreach ( $roles as $role )
                                                                @if($role->id == $role_user)
                                                                {{ $role->type }},
                                                                @endif
                                                            @endforeach
                                                        @endforeach
                                                    </td>
                                                    <td class="option-data">
                                                        @can('just-admin-or-manager')
                                                            <a href="{{ route('user.edit.form', encrypt($user->id) ) }}" class="btn btn-info btn-round"><i class="fa fa-refresh"
                                                                aria-hidden="true"></i> <span class="option-title"></span></a>
                                                            @if ($user->id == Auth::user()->id)
                                                                @can('only-admin')
                                                                <button class="btn btn-danger btn-round"><i
                                                                    class="fa fa-trash-o" aria-hidden="true"></i>
                                                                    <span class="option-title"></span></button>
                                                                @endcan
                                                            @else
                                                            
                                                                @can('only-admin')
                                                                <form action="{{ route('user.remove') }}"
                                                            method="POST" style="display: inline">
                                                                {{ csrf_field() }}
                                                                <input type="hidden" name="element"
                                                                    value="{{ $user->id }}">
                                                                <button class="btn btn-danger btn-round" type="submit"><i
                                                                        class="fa fa-trash-o" aria-hidden="true"></i>
                                                                        <span class="option-title"></span></button>
                                                            </form>
                                                                @endcan
                                                                
                                                            @endif 
                                                        @endcan
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4">
                                                        <h3>Sem usuários registados</h3>
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->

<table class="my-table" style="display: none">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Gênero</th>
            <th>Email</th>
            <th>Role</th>
        </tr>
    </thead>
    <tbody>
        @forelse($users as $key => $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $genders->where('id', $user->gender_id)->first()->type }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @foreach ( $roles_users->where('user_id', $user->id)->pluck('role_id')->toArray() as $role_user )
                        @foreach ( $roles as $role )
                            @if($role->id == $role_user)
                            {{ $role->type }},
                            @endif
                        @endforeach
                    @endforeach
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">
                    <h3>Sem usuários registados</h3>
                </td>
            </tr>
        @endforelse
    </tbody>
</table>


@endsection

@section('menu-sidebar')
@include('painel.partials.sidebar')
@endsection

@push('css')
    <link href="{{ url('painel/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ url('painel/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

    <link
        href="{{ url('painel/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}"
        rel="stylesheet">
    <link
        href="{{ url('painel/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}"
        rel="stylesheet">
    <link
        href="{{ url('painel/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}"
        rel="stylesheet">
    <link
        href="{{ url('painel/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}"
        rel="stylesheet">
    <link
        href="{{ url('painel/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}"
        rel="stylesheet">



@endpush

@push('js')
    <script src="{{ url('painel/vendors/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ url('painel/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}">
    </script>
    <script src="{{ url('painel/vendors/fastclick/lib/fastclick.js') }}"></script>
    <script src="{{ url('painel/vendors/nprogress/nprogress.js') }}"></script>
    <script src="{{ url('painel/vendors/iCheck/icheck.min.js') }}"></script>
    <!-- Datatables -->
    <script src="{{ url('painel/vendors/datatables.net/js/jquery.dataTables.min.js') }}">
    </script>
    <script
        src="{{ url('painel/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}">
    </script>
    <script
        src="{{ url('painel/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}">
    </script>
    <script
        src="{{ url('painel/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}">
    </script>
    <script src="{{ url('painel/vendors/datatables.net-buttons/js/buttons.flash.min.js') }}">
    </script>
    <script src="{{ url('painel/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}">
    </script>
    <script src="{{ url('painel/vendors/datatables.net-buttons/js/buttons.print.min.js') }}">
    </script>
    <script
        src="{{ url('painel/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}">
    </script>
    <script
        src="{{ url('painel/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}">
    </script>
    <script
        src="{{ url('painel/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}">
    </script>
    <script
        src="{{ url('painel/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}">
    </script>
    <script
        src="{{ url('painel/vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}">
    </script>
    <script src="{{ url('painel/vendors/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ url('painel/vendors/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ url('painel/vendors/pdfmake/build/vfs_fonts.js') }}"></script>

    <script>
        document.querySelector('#tablePDF').addEventListener('click', () => {

            // Header and footers - shows how header and footers can be drawn

            var doc = new jsPDF()
            var totalPagesExp = '{total_pages_count_string}';

            doc.autoTable({
                html: '.my-table',
                didDrawPage: function (data) {
                    // Header
                    doc.setFontSize(11)
                    doc.setTextColor(40)

                    var tableTitle = 'Lista de Users'
                    var textWidth = doc.getStringUnitWidth(tableTitle) * doc.internal.getFontSize() / doc.internal.scaleFactor;
                    var textOffset = (doc.internal.pageSize.width - textWidth)/2;
                    doc.text(textOffset, 25, tableTitle);

                    // Footer
                    var str = 'Página: ' + doc.internal.getNumberOfPages()
                    // Total page number plugin only available in jspdf v1.0+
                    if (typeof doc.putTotalPages === 'function') {
                        str = str + ' de ' + totalPagesExp
                    }
                    doc.setFontSize(10)

                    // jsPDF 1.4+ uses getWidth, <1.4 uses .width
                    var pageSize = doc.internal.pageSize
                    var pageHeight = pageSize.height ? pageSize.height : pageSize.getHeight()
		    var textWidth = doc.getStringUnitWidth(str) * doc.internal.getFontSize() / doc.internal.scaleFactor;
                    var textOffset = (doc.internal.pageSize.width - textWidth);
                    //doc.text(textOffset, 25, str, pageHeight - 10);
                    doc.text(str, textOffset, pageHeight - 10)
                },
                margin: { top: 30 },
            })

            // Total page number plugin only available in jspdf v1.0+
            if (typeof doc.putTotalPages === 'function') {
                doc.putTotalPages(totalPagesExp)
            }

            doc.save("lista-de-users.pdf");
        });
    </script>


@endpush
