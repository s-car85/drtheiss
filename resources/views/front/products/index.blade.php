@extends('master')

@section('title', 'Proizvodi - '.$cats->title.' -')


@section('content')

@include('front.partials._header')

<div class="container no-padding">
    <img src="{{ empty($cats->image) ? asset('images/drtheiss-banner-defauult.jpg') : $cats->image }}" alt="{{ $cats->title }}" class="img-responsive" />
    <div class="orange-wrap">
        <h2>{{ $cats->title }}</h2>
    </div>
</div>
<div class="row no-padding subcat-wraper">
   <div class="container products-wraper">


       @if($products->count())

           @foreach($products as $product)
                <div class="col-sm-12 col-md-6 no-padding">
                   <div class="product-wrap">
                        <div class="col-sm-6 no-padding">
                            <div class="link-box2">
                               <a href="{{ url('proizvod/'. str_slug($product->title) . '/' .$product->id ) }}" title="{{ $product->title }}">
                                    <img src="{{ asset($product->product_image) }}" alt="{{ $product->title }}" class="img-responsive product-image">
                               </a>
                            </div>
                        </div>
                        <div class="col-sm-6 no-padding">
                             <span class="vertical-line hidden-xs"></span>
                             <span class="hor-line-big2 visible-xs"></span>
                            <div class="link-box2">
                                <h3 class="product-title">{{ $product->title }}</h3>
                                <a href="{{ url('proizvod/'. str_slug($product->title) . '/' .$product->id ) }}" class="button-button-xsmall" title="Više o  {{ $product->title }}">Više o proizvodu</a>
                            </div>
                        </div>
                       <div class="clearfix"></div>
                   </div>
               </div>
           @endforeach


            <div class="clearfix"></div>
            {{--PAGINAICJA--}}

            <div class="pagination-bar text-center" >
                {!! $products->render() !!}
            </div>

       @else
        <div style="padding-top: 50px;  padding-bottom: 50px;">
           <h2 class="text-center">Proizvodi uskoro...</h2>
        </div>
       @endif



       <div class="clearfix"></div>
   </div>
</div>




@include('front.partials._footer')

@stop


@section('scripts')


<script>
  $(function() {



  });
</script>
@stop
