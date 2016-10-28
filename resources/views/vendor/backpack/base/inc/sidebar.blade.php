@if (Auth::check())
    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="http://placehold.it/160x160/00a65a/ffffff/&text={{ Auth::user()->name[0] }}" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>{{ Auth::user()->name }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          <li class="header">{{ trans('backpack::base.administration') }}</li>
          <!-- ================================================ -->
          <!-- ==== Recommended place for admin menu items ==== -->
          <!-- ================================================ -->
          <li><a href="{{ url(config('backpack.base.route_prefix').'/dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>

          <li><a href="{{ url('admin/elfinder') }}"><i class="fa fa-files-o"></i> <span>File manager</span></a></li>

          <!-- ======================================= -->
          @if(Entrust::hasRole('admin'))
            <li class="header">Ad Entries</li>
            <li><a href="{{ url('admin/entry') }}"><i class="fa fa-list-alt"></i> <span>Manage Entries</span></a></li>
            <li><a href="{{ url('admin/businesstype') }}"><i class="fa fa-users"></i> <span>Manage Business Types</span></a></li>
            <li><a href="{{ url('admin/adformat') }}"><i class="fa fa-street-view"></i> <span>Manage Ad Formats</span></a></li>
            <li><a href="{{ url('admin/state') }}"><i class="fa fa-list"></i> <span>Manage States</span></a></li>
            <li><a href="{{ url('admin/town') }}"><i class="fa fa-industry"></i> <span>Manage Towns</span></a></li>
            <li><a href="{{ url('admin/sitelocation') }}"><i class="fa fa-street-view"></i> <span>Manage Site Locations</span></a></li>
          @endif
        <!-- ======================================= -->

          <!-- ======================================= -->
          @if(Entrust::hasRole('admin'))
          <li class="header">Accounts Management</li>
          <li><a href="{{ url('admin/user') }}"><i class="fa fa-users"></i> <span>Manage Users</span></a></li>
          <li><a href="{{ url('admin/role') }}"><i class="fa fa-street-view"></i> <span>Manage Roles</span></a></li>
          <li><a href="{{ url('admin/permission') }}"><i class="fa fa-list"></i> <span>Manage Permissions</span></a></li>
          <li><a href="{{ url('admin/company') }}"><i class="fa fa-industry"></i> <span>Manage Companies</span></a></li>
          @endif
          <!-- ======================================= -->
          <li class="header">Map</li>
          <li><a href="{{ url ('admin/map') }}"><span> Test Map </span></a> </li>
          <li class="header">{{ trans('backpack::base.user') }}</li>
          <li><a href="{{ url(config('backpack.base.route_prefix').'/logout') }}"><i class="fa fa-sign-out"></i> <span>{{ trans('backpack::base.logout') }}</span></a></li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
@endif
