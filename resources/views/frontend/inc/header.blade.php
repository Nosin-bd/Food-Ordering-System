 <!-- Page Header-->
 <header class="section page-header">
        <!-- RD Navbar-->
        <div class="rd-navbar-wrap">
          <nav class="rd-navbar rd-navbar-classic" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-static" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="46px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
            <div class="rd-navbar-main-outer">
              <div class="rd-navbar-main">
                <!-- RD Navbar Panel-->
                <div class="rd-navbar-panel">
                  <!-- RD Navbar Toggle-->
                  <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                  <!-- RD Navbar Brand-->
                  <div class="rd-navbar-brand"><a href="index.html"><img class="brand-logo-light" src="images/logo-default1-140x57.png" alt="" width="140" height="57" srcset="images/logo-default-280x113.png 2x"/></a></div>
                </div>
                <div class="rd-navbar-main-element">
                  <div class="rd-navbar-nav-wrap" style="display: flex;align-items: center;">
                    <!-- RD Navbar Nav-->
                    <ul class="rd-navbar-nav">
                      <li class="rd-nav-item {{ (request()->routeIs('homepage')) ? 'active' : '' }}"><a class="rd-nav-link" href="{{ route('homepage') }} ">Home</a>
                      </li>
                      <li class="rd-nav-item {{ (request()->routeIs('about.page')) ? 'active' : '' }}"><a class="rd-nav-link" href="{{url('about')}}">About</a>
                      </li>

                      <li class="rd-nav-item {{ (request()->routeIs('contact.page')) ? 'active' : '' }}"><a class="rd-nav-link" href="{{url('contact')}}">Contacts</a>
                      </li>
                      @if(!Auth::user() ||  Auth::user()->isAdmin)
                      <li class="rd-nav-item {{ (request()->routeIs('login.page')) ? 'active' : '' }}"><a class="rd-nav-link" href="{{url('login-page')}}">Login</a>
                      </li>
                      @endif
                    </ul>
                    @if (Auth::user() &&  !Auth::user()->isAdmin)
                        <div class="dropdown" style="margin-left: 20px;">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            {{ Auth::user()->name }}
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('my.order') }}">My Order</a>
                                <a class="dropdown-item" href="{{ route('signout') }}">Logout</a>
                            </div>
                        </div>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </header>
