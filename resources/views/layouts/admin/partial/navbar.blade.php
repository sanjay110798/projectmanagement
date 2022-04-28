<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-sm-inline-block">
        <a href="{{url('/')}}" class="nav-link">Visit Site</a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
         
          <span class="badge badge-danger navbar-badge">1</span>
          
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
         
          <a href="" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{asset('assets/dist/img/user1-128x128.jpg')}}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                 
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">..</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>  Ago</p>
              </div>
            </div>
           
          </a>
        
          <div class="dropdown-divider"></div>
          
          <div class="dropdown-divider"></div>
          
          <a href="" class="dropdown-item dropdown-footer">See All Messages</a>
          
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
       <!-- Logout -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-home" style="font-size: 21px;"></i>
          
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          
          <div class="dropdown-divider"></div>
          
          <div class="dropdown-divider"></div>
          <a href="{{route('profile')}}" class="dropdown-item">
            <i class="fas fa-users mr-2"></i>Profile
            
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ route('logout') }}"onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
            <i class="fa fa-sign-out mr-2"></i>Logout
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
          </form>
          </a>
          <div class="dropdown-divider"></div>
          
        </div>
      </li>
     <!--  <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li> -->
    </ul>
  </nav>
  <!-- /.navbar -->