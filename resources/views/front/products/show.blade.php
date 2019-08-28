@extends('master')

@section('title', $product->title.' -')

@section('description', str_limit( $product->short_description, 160))

@section('og-title', $product->title)

@section('og-description', $product->short_description)

@section('og-image',  asset($product->product_image))



@section('content')

@include('front.partials._header')

<div class="container no-padding">
    <img src="{{ empty($product->image) ? asset('images/drtheiss-banner-defauult.jpg') : $product->image }}" alt="{{ $product->title }}" class="img-responsive" />
    <div class="orange-wrap">
        <h2>{{ $cats->title }}</h2>
    </div>
</div>
<div class="row no-padding subcat-wraper">
   <div class="container product-wraper">

       <div class="row no-padding">
            <div class="col-sm-4 no-padding">
                <div class="link-box3">
                    <img src="{{ asset($product->product_image) }}" alt="{{ $product->title }}" class="img-responsive product-image2">
                </div>
            </div>
            <div class="col-sm-8 no-padding">
               <div class="link-box3 pleft25">
                    <span class="hor-line-big2 visible-xs"></span>
                    <h1 class="product-title-big">{{ $product->title }}</h1>
                </div>
            </div>
       </div>


       <div class="clearfix"></div>

       <div class="product-body">
             {!! $product->description !!}

            <div class="clearfix"></div>
       </div>

       	<div class="socials" style="padding-left: 0;">
		        <span>Podeli sa prijateljima:</span> <br>
			 @include('front.partials._socials',['url' => Request::url()])
		</div>


       <div class="clearfix"></div>
   </div>
</div>




@include('front.partials._footer')

@stop


@section('scripts')


<script>
  $(function() {



  });
    /* Social share icons popup */
    var popupSize = {
    width: 780,
    height: 550
    };

    $(document).on('click', '.socials ul > li > a', function(e){

        var
                verticalPos = Math.floor(($(window).width() - popupSize.width) / 2),
                horisontalPos = Math.floor(($(window).height() - popupSize.height) / 2);

        var popup = window.open($(this).prop('href'), 'social',
                'width='+popupSize.width+',height='+popupSize.height+
                ',left='+verticalPos+',top='+horisontalPos+
                ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

        if (popup) {
            popup.focus();
            e.preventDefault();
        }

    });
</script>
@stop
