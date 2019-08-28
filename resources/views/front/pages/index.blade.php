@extends('master')



@section('content')

@include('front.partials._header')

<div class="row">
    <div class="rslides-container">
        <ul class="rslides">
           <li>
                <img src="{{ asset('images/4.jpg') }}" alt="1" class="hidden-xs">
                <img src="{{ asset('images/4-xs.jpg') }}" alt="1" class="visible-xs">
            </li>
            <li>
                <img src="{{ asset('images/2.jpg') }}" alt="2" class="hidden-xs">
                <img src="{{ asset('images/2-xs.jpg') }}" alt="2" class="visible-xs">
            </li>
            <li>
                <img src="{{ asset('images/3.jpg') }}" alt="3" class="hidden-xs">
                <img src="{{ asset('images/3-xs.jpg') }}" alt="3" class="visible-xs">
            </li>
        </ul>
            <ul id="unique-pager"> <!--this id gets inserted in manualControls -->
              <li><a href="#">01</a></li>
              <li><a href="#">02</a></li>
              <li><a href="#">03</a></li>
            </ul>
    </div>
</div>

<div class="row  no-padding" style="background-color: #f2f2f2">
    <div class="container no-padding">
        <div class="products-brands">
            <div class="col-md-4 grid-item">
                <div class="brand-cat">
                    <div class="logo-brand">
                         <div class="center-table">
                            <img src="{{ asset('images/drtheiss-whhite.png') }}" alt="drtheiss logo" class="img-responsive center-block">
                        </div>
                    </div>
                        <div class="logoName clearfix">
                             <a href="http://drtheiss.rs/proizvodi/dr-theiss/4" class="brandLink" title="Dr Theiss">Dr Theiss</a>
                        </div>
                        <ul class="products">
                            @foreach($categories->toArray() as $cat)
                                @if($cat['slug'] == 'dr-theiss')
                                    @foreach($cat['children'] as $c)
                                        <li><a href="{{ url('/proizvodi/'.$c['slug'].'/'.$c['id']) }}" title="{{ $c['title'] }}">{{ $c['title'] }}</a></li>
                                    @endforeach
                                @endif
                            @endforeach
                        </ul>
                </div>
            </div>
            <div class="col-md-4 grid-item">
                <div class="brand-cat">
                    <div class="logo-brand">
                        <div class="center-table">
                            <img src="{{ asset('images/pharmatheiss-whhite.png') }}" alt="pharmatheiss logo" class="img-responsive center-block">
                        </div>
                    </div>
                    <div class="logoName clearfix">
                        <a href="http://drtheiss.rs/proizvodi/pharma-theiss/11" class="brandLink" title="Pharma Theiss">Pharma Theiss</a>
                    </div>
                    <ul class="products">
                         @foreach($categories->toArray() as $cat)
                            @if($cat['slug'] == 'pharma-theiss')
                                @foreach($cat['children'] as $c)
                                    <li><a href="{{ url('/proizvodi/'.$c['slug'].'/'.$c['id']) }}" title="{{ $c['title'] }}">{{ $c['title'] }}</a></li>
                                @endforeach
                            @endif
                        @endforeach
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-md-4 grid-item">
                <div class="brand-cat">
                    <div class="logo-brand">
                        <div class="center-table">
                            <img src="{{ asset('images/zdrovit-white.png') }}" alt="zdrovit logo" class="img-responsive center-block">
                        </div>
                    </div>
                    <div class="logoName clearfix">
                        <a href="http://drtheiss.rs/proizvodi/zdrovit/13" class="brandLink" title="Zdrovit">Zdrovit</a>
                    </div>
                    <ul class="products">
                        @foreach($categories->toArray() as $cat)
                            @if($cat['slug'] == 'zdrovit')
                                @foreach($cat['children'] as $c)
                                    <li><a href="{{ url('/proizvodi/'.$c['slug'].'/'.$c['id']) }}" title="{{ $c['title'] }}">{{ $c['title'] }}</a></li>
                                @endforeach
                            @endif
                        @endforeach
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-md-4 grid-item">
                <div class="brand-cat">
                    <div class="logo-brand">
                        <div class="center-table">
                            <img src="{{ asset('images/lacalut-white.png') }}" alt="lacalut logo" class="img-responsive center-block">
                        </div>
                    </div>
                    <div class="logoName clearfix">
                        <a href="https://lacalut.rs/" class="brandLink" target="_blank" title="Lacalut">Lacalut</a>
                    </div>
                    <ul class="products">
                        <li><a href="https://lacalut.rs/proizvodi/paste/5" target="_blank" title="Lacalut paste">paste</a></li>
                        <li><a href="https://lacalut.rs/proizvodi/rastvori/6" target="_blank" title="Lacalut rastvori">rastvori</a></li>
                        <li><a href="https://lacalut.rs/proizvodi/cetkice/4" target="_blank" title="Lacalut četkice">četkice</a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-md-4 grid-item">
                <div class="brand-cat">
                    <div class="logo-brand">
                        <div class="center-table">
                            <img src="{{ asset('images/intact-white.png') }}" alt="intact logo" class="img-responsive center-block">
                        </div>
                    </div>
                    <div class="logoName clearfix">
                        <a href="http://drtheiss.rs/proizvodi/intact/14" class="brandLink">Intact</a>
                    </div>
                    <ul class="products">
                        <li><a href="http://drtheiss.rs/proizvod/intact-tablete-dekstroze-sa-ukusom-jagode/10"  title="Intact tablete sa ukusom jagode">Intact tablete sa ukusom jagode</a></li>
                        <li><a href="http://drtheiss.rs/proizvod/intact-tablete-dekstroze-sa-ukusom-pomorandze/9"  title="Intact tablete sa ukusom pomorandže">Intact tablete sa ukusom pomorandže</a></li>
                        <li><a href="http://drtheiss.rs/proizvod/intact-tablete-dekstroze-sa-ukusom-limuna/8"  title="Intact tablete sa ukusom limuna">Intact tablete sa ukusom limuna</a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@include('front.partials._footer')

@stop


@section('scripts')
<!--Masonry-->
<script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
<script src="https://unpkg.com/masonry-layout@4.1/dist/masonry.pkgd.min.js"></script>
  <!--TweeenMax-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.0/TweenLite.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/plugins/CSSPlugin.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/plugins/EaselPlugin.min.js"></script>
<script>
  $(function() {

      $(".rslides").responsiveSlides({
          auto: true,             // Boolean: Animate automatically, true or false
          speed: 1000,            // Integer: Speed of the transition, in milliseconds
          timeout: 3000,          // Integer: Time between slide transitions, in milliseconds
          pager: true,           // Boolean: Show pager, true or false
          nav: true,             // Boolean: Show navigation, true or false
          random: false,          // Boolean: Randomize the order of the slides, true or false
          pause: false,           // Boolean: Pause on hover, true or false
          pauseControls: true,    // Boolean: Pause when hovering controls, true or false
          prevText: "",   // String: Text for the "previous" button
          nextText: "",       // String: Text for the "next" button
          maxwidth: "",           // Integer: Max-width of the slideshow, in pixels
          navContainer: "",       // Selector: Where controls should be appended to, default is after the 'ul'
          manualControls: "#unique-pager",     // Selector: Declare custom pager navigation
          namespace: "rslides",   // String: Change the default namespace used
          before: function(){},   // Function: Before callback
          after: function(){}     // Function: After callback
        });

        var brandLink = $('.brandLink');
        var brandCat = $('.brand-cat');
        var products = $('.products');

        brandCat.hover(
            function (){
                TweenLite.to( $(this).find('.logo-brand'), 0.5, {  marginBottom:2,marginTop:-40, backgroundColor:"#f59c04", height: 175, ease:Power4.easeOut });
                TweenLite.to( $(this).find('.logoName'), 0.1, { borderBottom:"0", backgroundColor:"#ccc", ease:Power4.easeOut }, '-=0.3');
            }, function (){
                TweenLite.to( $(this).find('.logo-brand'), 1,  {marginBottom:7, marginTop: 0, backgroundColor:"#ccc", height: 120, ease:Power4.easeOut });
                TweenLite.to( $(this).find('.logoName'), 0.1, {  borderBottom:"3px solid #ff8b38", backgroundColor:"#333" }, '-=0.3');
            }
        );

  });

$(document).ready(function() {

    var $container = $('.products-brands');


    var $grid = $container.masonry({
      // options...
      itemSelector: '.grid-item'
    });

    $grid.imagesLoaded( function() {
            $grid.masonry();
    });
});
</script>
@stop
