@extends('master')

@section('title', 'Pretraga -')


@section('content')

@include('front.partials._header')

<div class="row no-padding subcat-wraper">
   <div class="container products-wraper">

        <h3>Rezultati pretrage za "{{$term}}" ({!! ($products != null)?$products->total():0!!})</h3>

       @if($products->count())

           @foreach($products as $product)
                <div class="col-sm-12 col-md-6 no-padding">
                   <div class="product-wrap">
                        <div class="col-sm-6 no-padding">
                            <div class="link-box2">
                               <a href="{{ url('proizvod/'. str_slug($product->title) . '/' .$product->id ) }}" title="{{ $product->title }}" target="_blank">
                                    <img src="{{ asset($product->product_image) }}" alt="{{ $product->title }}" class="img-responsive product-image">
                               </a>
                            </div>
                        </div>
                        <div class="col-sm-6 no-padding">
                             <span class="vertical-line hidden-xs"></span>
                             <span class="hor-line-big2 visible-xs"></span>
                            <div class="link-box2">
                                <h3 class="product-title">{{ $product->title }}</h3>
                                <a href="{{ url('proizvod/'. str_slug($product->title) . '/' .$product->id ) }}" target="_blank" class="button-button-xsmall" title="Više o  {{ $product->title }}">Više o proizvodu</a>
                                <hr class="hidden-xs">
                                <div class="result-cat">
                                    <p>Kategorija proizvoda:</p>
                                    @foreach($count as $key => $val)
                                        @if($val->id == $product->category_id)
                                           <a href="{{ url('/proizvodi/'.$val->slug.'/'.$val->id  ) }}" title="{{$val->title}}" target="_blank">{{$val->title}}</a>
                                        @endif
                                   @endforeach
                                </div>
                            </div>
                        </div>
                       <div class="clearfix"></div>
                   </div>
               </div>
           @endforeach

       @else
        <div style="padding-top: 50px;  padding-bottom: 50px;">
           <h4 class="text-center">Nema rezultata pretrage za traženi termin.</h4>
        </div>
       @endif


        <div class="clearfix"></div>
        {{--PAGINAICJA--}}

        <div class="pagination-bar text-center" >
            {!! $products->render() !!}
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
</script>
@stop
