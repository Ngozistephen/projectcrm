 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    {{-- <a href="{{route('admin.porfolios.index')}}" class="brand-link"> --}}
        <span class="brand-text font-weight-bold">{{config('app.name')}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
               <a href="#" class="d-block font-weight-bold"> </a>  
               {{-- {{ Auth::user()->first_name }} --}}

            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            
           

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
               <li class="nav-item">
                   <a href="#" class="nav-link data-toggle="modal" data-target="#exampleModal">
                        
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                       <p> Dashboard  </p>
                   </a>
               </li>
               <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
                   
               
            </ul>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                    <i class=" nav-icon fa-regular fa-user"></i>
                    {{-- <i class="nav-icon fa-solid fa-floppy-disk"></i> --}}
                    <p> Users <span class="right badge badge-danger">New</span></p>
                    </a> 
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('dashboard.users.create')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Create</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href= "{{route('dashboard.users.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All</p>
                            </a> 
                </li>
            </ul>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fa-solid fa-address-book"></i>
                    
                    <p>
                        Clients
                        <i class="right fas fa-angle-left"></i>
                        
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('dashboard.clients.create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Create</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href= "{{route('dashboard.clients.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>All</p>
                        </a>
                </li>
            </ul>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fa-solid fa-laptop-file"></i>    
                    <p>
                        Projects
                        <i class="right fas fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('dashboard.projects.create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Create</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('dashboard.projects.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>All</p>
                        </a>
                </li>
            </ul>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fa-solid fa-list"></i>    
                    <p>
                    Tasks   
                        <i class="right fas fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('dashboard.tasks.create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Create</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('dashboard.tasks.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>All</p>
                        </a>
                </li>
            </ul>
            {{-- @if (auth()->user()->termsAccepted)
            @endif --}}


         


                   <!-- Authentication Links -->
                     @guest
                         @if (Route::has('login'))
     
                             <li class="nav-item">
                                 <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}
                                     <i class="fa-solid fa-power-off nav-icon"></i>
                                     <p></p>
                                 </a>
                             </li>
                         @endif

                         @if (Route::has('register'))
                             <li class="nav-item">
                                 <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}
                                     <i class="fa-solid fa-power-off nav-icon"></i> 
                                     <p></p>
                                 </a>
                             </li>
                         @endif
                       @else
                         <li class="nav-item">

                             <a class="nav-link" href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                 <i class="fa-solid fa-power-off nav-icon"></i>
                                 <p>{{ __('Logout') }}</p>
                             </a>

                             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                 @csrf
                             </form>
                         </li>
                     @endguest


                   
              
          
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>