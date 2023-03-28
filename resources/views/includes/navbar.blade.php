<!-- Main Header -->
<header class="main-header">

        <!-- Logo -->
<a href="{{route('login')}}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini">
            <b>S</b>P
            
          </span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">
            <b>Supply</b>Chain
            
          </span>
        </a>
    
        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">



          <!-- Sidebar toggle button-->
          
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>

          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            
            <ul class="nav navbar-nav">
             
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="{{asset('AdminLTE-2.4.5/dist/img/user_4.png')}}" class="user-image" alt="User Image">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs">{{ucwords(Auth::user()->name)}}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="{{asset('AdminLTE-2.4.5/dist/img/user_4.png')}}" class="img-circle" alt="User Image">
    
                    <p>
                        {{ucwords(Auth::user()->name)}} 
                    {{-- <small>{{session('department')}}</small> --}}
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                  
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat" disabled>Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"
                       class="btn btn-default btn-flat">
                       Sign out
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                    </div>
                  </li>
                </ul>
              </li>



            </ul>
          </div>
        </nav>
      </header>