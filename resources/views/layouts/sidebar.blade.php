  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    @if (Auth::user()->role === 1)
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset("/bower_components/AdminLTE/dist/img/user-200.png") }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->firstname}} {{ Auth::user()->lastname}}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle"></i> Administrator</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <!-- Optionally, you can add icons to the links -->
        <li><a href="/"><span class="fa fa-dashboard"></span> <span class="xn-text">Dashboard</span></a></li>
        <li class="header">MAINTENANCE</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cogs"></i> <span>Service</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{ url('service-category') }}"><i class="fa fa-circle-o"></i>Service Category</a></li>
            <li><a href="{{ url('service-duration') }}"><i class="fa fa-circle-o"></i>Service Duration</a></li>
            <li><a href="{{ url('service') }}"><i class="fa fa-circle-o"></i>Service</a></li>
          </ul>
        </li>
        <li>
          <a href="{{ url('room') }}"><span class="fa fa-home"></span>Room</a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-group"></i> <span>Therapist</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{ url('therapist-position') }}"><i class="fa fa-circle-o"></i>Therapist Position</a></li>
            <li><a href="{{ url('therapist') }}"><i class="fa fa-circle-o"></i>Therapist</a></li>
          </ul>
        </li>
        <li>
          <a href="{{ url('location-rate') }}"><span class="fa fa-map-marker"></span>Home Service Rate</a>
        </li>                    
        <li>
          <a href="#"><span class="fa fa-certificate"></span>Promo</a>
        </li>                    
        <li>
          <a href="{{ url('discount') }}"><span class="fa fa-tags"></span>Discount</a>
        </li>
        <li class="header">TRANSACTION</li>
        <li>
          <a href="{{ url('reservation') }}"><span class="fa fa-pencil-square"></span>Reservations</a>
        </li>
        <li>
          <a href="{{ url('appointment') }}"><span class="fa fa-calendar-check-o"></span>Appointments</a>
        </li>
        <li>
          <a href="{{ url('walk-in') }}"><span class="fa fa-female"></span>Walk-In</a>
        </li>
        <li class="header">REPORTS</li>
        <li>
          <a href="#"><span class="fa fa-file-text-o"></span>Walk-In Report</a>
        </li>
        <li>
          <a href="#"><span class="fa fa-file-text-o"></span>Home Services Report</a>
        </li>
        <li>
          <a href="#"><span class="fa fa-file-text-o"></span>Sales Report</a>
        </li>
        <li class="header">UTILITIES</li>
        <li><a href="{{ route('user-management.index') }}"><i class="fa fa-group"></i> <span>User Management</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
    @elseif(Auth::user()->role===0)
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset("/bower_components/AdminLTE/dist/img/user-200.png") }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->firstname}} {{ Auth::user()->lastname}}</p>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li><a href=""><span class="fa fa-home"></span> <span class="xn-text">Home</span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cogs"></i> <span>My Transactions</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{ url('reservation/create') }}"><i class="fa fa-pencil-square"></i>Reserve an Appointment</a></li>
            <li><a href="{{ url('appointment-guest') }}"><i class="fa fa-circle-o"></i>Appointments</a></li>
          </ul>
        </li>
        <li>
          <a href="{{ url('profile') }}"><span class="fa fa-user"></span>Profile</a>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
    @endif
  </aside>