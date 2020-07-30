
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color:#315c72 !important">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars grey"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
              <a href="/" class="nav-link" style="color:white;"> Home</a>
            </li>
          </ul>
      
          <!-- SEARCH FORM -->
          <!-- <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </form> -->
      
          <!-- Right navbar links -->
          <ul class="navbar-nav ml-auto">
            <!-- left navbar content displayed here. You can add your content -->
              <!-- Authentication Links -->
            @guest
                <!-- <li><a class="nav-link" href="{{route('login')}}">login</a></li>
                <li><a class="nav-link" href="{{route('register')}}">register</a></li> -->
            @else
            <li class="nav-item">
            <a class="nav-link" href="{{route('logout')}}" role="button"  onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"  title="logout"><i
                  class="fas fa-power-off red"></i></a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>

            </li>
                
            @endguest

            <li class="nav-item">
              <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
                  class="fas fa-th-large grey"></i></a>
            </li>
          </ul>
        </nav>
        <!-- /.navbar -->
