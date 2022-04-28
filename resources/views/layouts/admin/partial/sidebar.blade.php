<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/')}}" class="brand-link">
      <img src="{{asset('assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Project Manager </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          
          <?php if(Auth::user()->image==''){?>
          <img src="{{asset('assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
          <?php }else{?>
          <img src="{{asset('upload/profile/'.Auth::user()->image)}}" alt="user" class="img-circle elevation-2" style="height: 3.1rem;width: 3.1rem;" />
          <?php } ?>
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>
 -->
      <!-- Sidebar Menu -->
      <?php 
      $seg2=Request::segment(2);
      $role_id=Auth::user()->role;
      // $route=Route::current()->getName();
      // echo $route;
      ?>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            
             <a href="{{route('dashboard')}}" class="nav-link <?php if($seg2=='dashboard'){?>active<?php } ?>">
           
            
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
               
              </p>
            </a>
            
          </li>
          <?php if($Appservice->checkListaccess('general.management')==true){?>
         <li class="nav-item">
            <a href="{{route('general.management')}}" class="nav-link <?php if($seg2=='general-setting'){?>active<?php } ?>">
              <i class="fa fa-cogs nav-icon"></i>
              <p>
                General Settings
               
              </p>
            </a>
            
          </li>
         <?php } if($Appservice->checkListaccess('role.management')==true){?>
          <li class="nav-item">
            <a href="{{route('role.management')}}" class="nav-link <?php if($seg2=='role-management'){?>active<?php } ?>">
              <i class="fa fa-user nav-icon"></i>
              <p>
                Role Management
               
              </p>
            </a>
            
          </li>
         
           <!-- <li class="nav-item">
            <a href="{{route('menu.management')}}" class="nav-link <?php if($seg2=='menu-management'){?>active<?php } ?>">
              <i class="fa fa-user nav-icon"></i>
              <p>
                Menu Management
               
              </p>
            </a>
            
          </li> -->
          <?php } if($Appservice->checkListaccess('user.management')==true){?>
           <li class="nav-item">
            <a href="{{route('user.management')}}" class="nav-link <?php if($seg2=='user-management'){?>active<?php } ?>">
              <i class="fa fa-user nav-icon"></i>
              <p>
                User Management
               
              </p>
            </a>
            
          </li>
          <?php } if($Appservice->checkListaccess('project.management')==true){?>
           <li class="nav-item">
            <a href="{{route('project.management')}}" class="nav-link <?php if($seg2=='project-management'){?>active<?php } ?>">
              <i class="fa fa-user nav-icon"></i>
              <p>
                Project Management
               
              </p>
            </a>
            
          </li>
          <?php } if($Appservice->checkListaccess('group.management')==true){?>
           <li class="nav-item">
            <a href="{{route('group.management')}}" class="nav-link <?php if($seg2=='group-management'){?>active<?php } ?>">
              <i class="fa fa-user nav-icon"></i>
              <p>
                Group Management
               
              </p>
            </a>
            
          </li>
          <?php } if($Appservice->checkListaccess('updatefor.management')==true){?>
          <li class="nav-item">
            <a href="{{route('updatefor.management')}}" class="nav-link <?php if($seg2=='updatefor-management'){?>active<?php } ?>">
              <i class="fa fa-user nav-icon"></i>
              <p>
                Update For List
               
              </p>
            </a>
            
          </li>
          <?php } if($Appservice->checkListaccess('social.management')==true){?>
           <li class="nav-item">
            <a href="{{route('social.management')}}" class="nav-link <?php if($seg2=='social-management'){?>active<?php } ?>">
              <i class="fa fa-user nav-icon"></i>
              <p>
                General Post Management
               
              </p>
            </a>
            
          </li>
          <?php } ?>
         <!-- <li class="nav-item <?php if($seg2=='blog-category-management' || $seg2=='blog-management'){echo'menu-is-opening menu-open';}?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Blog Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
             
              <li class="nav-item">
                <a href="" class="nav-link <?php if($seg2=='blog-category-management'){?>active<?php } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blog Category</p>
                </a>
              </li>
            
              <li class="nav-item">
                <a href="" class="nav-link <?php if($seg2=='blog-management'){?>active<?php } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blog Listing</p>
                </a>
              </li>
            
            </ul>
          </li> -->
        
        
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>