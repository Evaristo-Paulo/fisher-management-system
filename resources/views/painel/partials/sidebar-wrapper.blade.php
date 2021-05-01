<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{  route('home') }}" class="site_title"><i class="fa fa-paw"></i> <span>SGA</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix" style="box-shadow: 0px 2px 15px rgba(0,0,0,.2); margin: 20px 0" >
            <div class="profile_pic" style="margin-bottom: 20px">
                <img src="{{ url("storage/users/". Auth::user()->photo. "") }}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span style="font-size: .8rem; color: #fff">{{  Auth::user()->name }}</span>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        @yield('menu-sidebar')
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        @include('painel.partials.sidebar-footer')
        <!-- /menu footer buttons -->
    </div>
</div>