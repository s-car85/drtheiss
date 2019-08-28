<section id="header">
        <div class="header-top">
            <div class="row-no-padding">
                 <div class="container">
                    <div class="col-xs-12 visible-xs visible-sm visible-md">
                        <div class="logo">
                            <a href="{{ url('/') }}" title="Dr Theiss">
                              <img src="{{ asset('images/drtheiss-logo.png') }}" alt="Dr Theiss" class="img-responsive">
                            </a>
                        </div>
                    </div>
                     <div class="clearfix"></div>
                     <div class="col-md-12">
                        <div class="search-form">
                             {!! Form::open(['url'=>'pretraga','method'=>'GET']) !!}
                                <div id="search-input">
                                     <label for="search-input">
                                         <i class="fa fa-search" aria-hidden="true"></i>
                                         <span class="sr-only">PRETRAŽI</span>
                                     </label>
                                    <input class="form-control form-rounded" type="search" name="q" placeholder="PRETRAŽI" value="{{isset($term) ? $term : ''}}">
                                </div>
                              {!! Form::close() !!}
                        </div>
                         @if(count($vaucers)>0)
                         <div class="actioncall2">
                             <a href="{{ url('vauceri') }}" class="button-button-xsmall" title="Vaučeri"><i class="fa fa-tags"></i> VAUČERI</a>
                         </div>
                         @endif
                         <div class="actioncall">
                             <a href="{{ url('prijava') }}" class="button-button-xsmall" title="Online prijava prdavanja"><i class="fa fa-sign-in"></i> ONLINE PRIJAVA PREDAVANJA</a>
                         </div>
                     </div>
                </div>
            </div>
        </div>
        <div class="header-main">
           <div class="row-no-padding">
                <div class="container no-padding">

                    <div class="col-md-12 col-lg-4 col-xs-12 hidden-md hidden-xs hidden-sm">
                        <div class="logo">
                            <a href="{{ url('/') }}" title="Dr Theiss">
                              <img src="{{ asset('images/drtheiss-logo.png') }}" alt="Dr Theiss" class="img-responsive ">
                            </a>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-8 col-sm-12">
                            @include('front.partials._nav')
                    </div>
                </div>
            </div>
        </div>
</section>