<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <!-- Optionally, you can add icons to the links -->
            <li {!! Request::is('admin') ? 'class="active"' : '' !!}><a href="{{ url('/admin') }}"><i class='fa fa-dashboard'></i> <span>{{ trans('admin_message.sidebar.dashboard') }}</span></a></li>

            <li {!! Request::is('admin/lectures*') || Request::is('admin/lectureevents*')  ? 'class="active"' : '' !!} class="treeview">
                <a href="#">
                    <i class='fa fa-external-link'></i> <span>{{ trans('admin_message.sidebar.lecturet') }}</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li {!! Request::is('admin/lectureevents*') ? 'class="active"' : '' !!}><a href="{{ url('/admin/lectureevents') }}"><i class='fa fa{!! Request::is('admin/lectureevents*') ? '-dot' : '' !!}-circle-o'></i> <span>{{ trans('admin_message.sidebar.lectureevents') }}</span></a></li>
                    <li {!! Request::is('admin/lectures*') ? 'class="active"' : '' !!}><a href="{{ url('/admin/lectures') }}"><i class='fa fa{!! Request::is('admin/lectures*') ? '-dot' : '' !!}-circle-o'></i> <span>{{ trans('admin_message.sidebar.lecture') }}</span></a></li>
                </ul>
            </li>

            <li {!! Request::is('admin/categories*') ? 'class="active"' : '' !!}><a href="{{ url('/admin/categories') }}"><i class='fa fa-sitemap'></i> <span>{{ trans('admin_message.sidebar.categories') }}</span></a></li>
            <li {!! Request::is('admin/products*') ? 'class="active"' : '' !!}><a href="{{ url('/admin/products') }}"><i class='fa fa-shopping-cart'></i> <span>{{ trans('admin_message.sidebar.products') }}</span></a></li>
            <li {!! Request::is('admin/contacts*') ? 'class="active"' : '' !!}><a href="{{ url('/admin/contacts') }}"><i class='fa fa-envelope'></i> <span>{{ trans('admin_message.sidebar.contact') }}</span></a></li>
            {{--<li {!! Request::is('admin/photos*') ? 'class="active"' : '' !!}><a href="{{ url('/admin/photos') }}"><i class='fa fa-photo'></i> <span>{{ trans('admin_message.sidebar.photo') }}</span></a></li>--}}
            <li {!! Request::is('admin/vaucers*') ? 'class="active"' : '' !!}><a href="{{ url('/admin/vaucers') }}"><i class='fa fa-tags'></i> <span>{{ trans('admin_message.sidebar.vaucer') }}</span></a></li>
            <li {!! Request::is('admin/posts*') ? 'class="active"' : '' !!}><a href="{{ url('/admin/posts') }}"><i class='fa fa-pencil-square-o'></i> <span>{{ trans('admin_message.sidebar.post') }}</span></a></li>
            {{--<li {!! Request::is('admin/testimonials*') || Request::is('admin/clientlogos*')  ? 'class="active"' : '' !!} class="treeview">--}}
                {{--<a href="#"><i class='fa fa-users'></i> <span>{{ trans('admin_message.sidebar.clients') }}</span></a>--}}
                {{--<ul class="treeview-menu">--}}
                {{--<li {!! Request::is('admin/testimonials') ? 'class="active"' : '' !!}><a href="{{ url('/admin/testimonials') }}"><i class="fa fa-circle-o"></i> {{ trans('admin_message.sidebar.client.testimonials') }}</a></li>--}}
                {{--<li {!! Request::is('admin/clientlogos') ? 'class="active"' : '' !!}><a href="{{ url('/admin/clientlogos') }}"><i class="fa fa-circle-o"></i> {{ trans('admin_message.sidebar.client.logos') }}</a></li>--}}
              {{--</ul>--}}
            {{--</li>--}}
            <li {!! Request::is('admin/user*') ? 'class="active"' : '' !!}><a href="{{ url('/admin/users') }}"><i class='fa fa-user'></i> <span>{{ trans('admin_message.sidebar.users') }}</span></a></li>
            <li {!! Request::is('admin/medias*') ? 'class="active"' : '' !!}><a href="{{ url('/admin/medias') }}"><i class='fa fa-file'></i> <span>{{ trans('admin_message.sidebar.filemanager') }}</span></a></li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
