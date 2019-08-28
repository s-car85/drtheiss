<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="{{ url('/admin') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>D</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b>DrTheiss</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">{{ trans('admin_message.togglenav') }}</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                @if($contacts->count() > 0)
                 <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="fa fa-envelope-o"></i>
                         <span class="label label-warning">{{ $contacts->count() }}</span>
                    </a>
                    @if($contacts->count() > 0)
                    <ul class="dropdown-menu">
                      <li class="header">Nove poruke: {{$contacts->count()}}</li>
                      <li>
                        <!-- inner menu: contains the actual data -->
                        <ul class="menu">
                            <!-- start message -->
                            @foreach($contacts->get() as $cont)
                              <li>
                                <a href="#">
                                  <h4>
                                    {{ $cont->name }}
                                    <small><i class="fa fa-clock-o"></i> {{ $cont->created_at }} </small>
                                  </h4>
                                  <p>{{ $cont->theme }}</p>
                                </a>
                              </li>
                            <li>
                            @endforeach
                            <!-- end message -->
                        </ul>
                      </li>
                      <li class="footer"><a href="{{ url('/admin/contacts') }}">Pogledaj sve</a></li>
                    </ul>
                    @endif
                </li>
               @endif
                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        <img src="{{ asset($logedUser->avatar)}}" class="user-image" alt="User Image"/>
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs">{{ $logedUser->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            <img src="{{ asset($logedUser->avatar)}}" class="img-circle" alt="User Image" />
                            <p>
                                {{ $logedUser->name }}
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ url('/admin/profile') }}" class="btn btn-default btn-flat">{{ trans('admin_message.profile') }}</a>
                            </div>

                            <div class="pull-right">
                                <a href="{{ route('logout') }}" class="btn btn-default btn-flat"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    {{ trans('admin_message.signout') }}
                                </a>
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                 </form>
                             </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
