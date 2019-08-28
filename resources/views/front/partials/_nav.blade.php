        <nav class="navbar navbar-default">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <nav>
                    <ul class="nav navbar-nav">
                        <li {!! Request::is('o-kompaniji') ? 'class="active"' : '' !!}><a href="{{ url('o-kompaniji') }}" title="O kompaniji" class="effect-3">O kompaniji</a></li>
                        <li class="dropdown {!! Request::is('proizvodi*') || Request::is('proizvod*')  ? 'active' : '' !!}">
                          <a href="#" class="dropdown-toggle"
                             data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Proizvodi <span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                  @foreach($categories as $cat)
                                    <li class="{!! Request::is('proizvodi/'.$cat->slug.'/'.$cat->id) ? 'active' : '' !!}"><a href="{{ url('/proizvodi/'.$cat->slug.'/'.$cat->id) }}" title="{{ $cat->title }}">{{ $cat->title }}</a></li>
                                  @endforeach
                                    <li><a href="{{ url('https://lacalut.rs/') }}" title="Lacalut" target="_blank">Lacalut</a></li>
                              </ul>
                        </li>
                        <li {!! Request::is('blog*') ? 'class="active"' : '' !!}><a href="{{ url('blog') }}" title="Blog" class="effect-3">Blog</a></li>
                        <li {!! Request::is('lekovito-bilje') ? 'class="active"' : '' !!}><a href="{{ url('lekovito-bilje') }}" title="O lekovitim biljkama" class="effect-3">O lekovitim biljkama</a></li>
                        <li {!! Request::is('kontakt') ? 'class="active"' : '' !!}><a href="{{ url('kontakt') }}" title="Kontakt" class="effect-3">Kontakt</a></li>
                    </ul>
                </nav>
            </div>
        </nav>