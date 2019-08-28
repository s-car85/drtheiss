@extends('master')

@section('title', 'Greška 404')


@section('content')

@include('front.partials._header')

<div class="container biljke-wrap">
    <div class="row no-padding">

       <div class="col-md-12 text-center" style="padding-left:0;padding-right:0;padding-top: 40px; padding-bottom: 40px;">
            <h2 class="gray-heading3">Greška 404 - Tražena strana nije pronađena.</h2>
        </div>

        <div class="col-md-12 no-padding">
            <img src="{{ asset('images/404.jpg') }}" alt="Greška 404" class="img-responsive margin-center">
        </div>

    </div>

</div>

	@include('front.partials._footer')

@stop

