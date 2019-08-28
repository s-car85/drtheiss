@extends('master')

@section('title', 'Proizvodi - '.$cats->title.' -')


@section('content')

@include('front.partials._header')

<div class="container no-padding">
    <img src="{{ $cats->image }}" alt="{{ $cats->title }}" class="img-responsive" />
</div>
<div class="row no-padding">
   <div class="container no-padding subcat-wraper">
        <div class="logo-wraper">
            <img src="{{ $cats->logo }}" alt="{{ $cats->title }} logo" class="img-responsive margin-center">
            <span class="hor-line-small"></span>
            <h3>Proizvodi</h3>
            <div class="clearfix"></div>
        </div>

       <div class="subcats-wraper visible-md visible-lg">
        @foreach (array_chunk($subCats->all(), 3) as $rows )

            <div class="row no-padding">
                @foreach($rows as $cat)

                        <div class="col-md-4 no-padding">
                           <div class="subcategory">
                               <a href="{{ url('/proizvodi/'.$cat['slug'].'/'.$cat['id']) }}" title="{{  $cat['title'] }}" class="sub-link">
                                   <div class="image-sub">
                                        <img src="{{ $cat['simage'] }}" alt="{{  $cat['title'] }}" class="img-responsive margin-center">
                                   </div>
                                   <div class="link-box">
                                       <span class="subcat-text">{{  $cat['title'] }}</span>
                                   </div>
                               </a>
                           </div>
                       </div>

                @endforeach
            </div>

            <span class="hor-line-big"></span>

        @endforeach
       </div>

    <div class="subcats-wraper visible-sm visible-xs">
        @foreach (array_chunk($subCats->all(), 2) as $rows )

            <div class="row no-padding">
                @foreach($rows as $cat)

                        <div class="col-sm-6 no-padding">
                           <div class="subcategory">
                               <a href="{{ url('/proizvodi/'.$cat['slug'].'/'.$cat['id']) }}" title="{{  $cat['title'] }}" class="sub-link">
                                   <div class="image-sub">
                                        <img src="{{ $cat['simage'] }}" alt="{{  $cat['title'] }}" class="img-responsive margin-center">
                                    </div>
                                   <div class="link-box">
                                       <span class="subcat-text">{{  $cat['title'] }}</span>
                                   </div>
                               </a>
                           </div>
                       </div>

                @endforeach
            </div>

            <span class="hor-line-big"></span>

        @endforeach
       </div>

   </div>
</div>




@include('front.partials._footer')

@stop


@section('scripts')
  {{--<!--TweeenMax-->--}}
{{--<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.0/TweenLite.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/plugins/CSSPlugin.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/plugins/EaselPlugin.min.js"></script>--}}
<script>
  $(function() {


//        var sublink = $('.sub-link');
//        var linkbox = $('.link-box');
//        var subcattext = $('.subcat-text');

//        sublink.hover(
//            function (){
//                TweenLite.to( $(this).find('.link-box'), 0.5, {   backgroundColor:"#f39b00", border:"none", ease:Power4.easeOut });
//                TweenLite.to( $(this).find('.subcat-text'), 0.1, { color:"#fff", ease:Power4.easeOut });
//            }, function (){
//                TweenLite.to( $(this).find('.link-box'), 0.5, {   backgroundColor:"#fff", border:"1px solid #ccc", ease:Power4.easeOut });
//                TweenLite.to( $(this).find('.subcat-text'), 0.1, { color:"#333", ease:Power4.easeOut });
//            }
//        );

  });
</script>
@stop
