<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3 class="home-btn"><a href="{{ route('home') }}" class="text-white"><i class="fa fa-home"></i> Home</a></h3>
        <ul class="nav side-menu">
            <li><a><i class="fa fa-user"></i> Armador <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    @can('just-admin-or-manager')
                        <li><a href="{{ route('fisher.register') }}">Registo</a></li>
                    @endcan
                    <li><a href="{{ route('fisher.list') }}">Listagem</a></li>
                    @can('just-admin-or-manager')
                    <li><a href="#" class="modal-alteracao-fotografia">Mudar fotografia</a></li>
                    @endcan
                </ul>
            </li>
            <li><a><i class="fa fa-anchor"></i> Captura <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    @can('just-admin-or-manager')
                    <li><a href="#" data-toggle="modal" data-target=".bs-example-modal-lg">Atribuir</a>
                    </li>
                    @endcan
                    <li><a href="{{ route('fisher.freight.list') }}">Listagem</a>
                    </li>
                </ul>
            </li>
            <li><a><i class="fa fa-file-text-o"></i> Relatório <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{  route('relatory.capture.fishers') }}">Captura por armadores</a>
                    </li>
                    <li><a href="{{ route('relatory.capture.specie') }}">Captura por espécie</a>
                    </li>
                </ul>
            </li>
            @can('just-admin-or-manager')
                <li><a><i class="fa fa-cogs"></i> Controle de acesso <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a>User<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                @can('only-admin')
                                <li class="sub_menu"><a href="{{ route('user.register.form') }}">Registo</a>
                                </li> 
                                @endcan
                                <li><a href="{{ route('user.list') }}">Listagem</a>
                                </li>
                                @can('just-admin-or-manager')
                                <li class="sub_menu"><a href="#" class="modal-alteracao-senha">Mudar senha</a>
                                </li> 
                                @endcan
                            </ul>
                        </li>
                    </ul>
                </li>
            @endcan

        </ul>
    </div>

</div>
