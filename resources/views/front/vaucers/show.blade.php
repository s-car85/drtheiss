@extends('master')

@section('title', $vaucer->vaucer_title .' -')

@section('description', $vaucer->vaucer_desc)

@section('og-title', $vaucer->vaucer_title)
@section('og-description', $vaucer->vaucer_desc)
@if($vaucer->vaucer_banner != null)
	@section('og-image',  asset($vaucer->vaucer_banner))
@endif

@section('style')
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<style>
		iframe{
			border: none;
		}
	</style>
@stop

@section('content')

	@include('front.partials._header')

<section class="post-wrap posts-wrap2">
	<div class="row no-padding subcat-wraper">
		<div class="container product-wraper">

			<h1 class="blog-title-big text-center">{{ $vaucer->vaucer_title }} </h1>

			<div class="col-md-12 inner-post">

				@if($vaucer->vaucer_banner != null)
					<img src="{{ asset($vaucer->vaucer_banner) }}" class="img-responsive" style="max-height: 500px;" alt="{{ $vaucer->vaucer_title }}">
				@endif

				<div class="post-text product-body">
					{!! $vaucer->vaucer_body !!}
					<div class="clearfix"></div>
				</div>

				<div class="post-read-more">
					<a href="{{ url('vaucer-download/'.$vaucer->slug) }}" id="download-va" data-slug="{{$vaucer->slug}}"  class="button-button-xsmall x2"><i class="fa fa-download"></i> Preuzmi vaučer</a>
				</div>


				<div class="socials" style="padding-left: 0;">
				  <span>Podeli sa prijateljima</span> <br>
					 @include('front.partials._socials',['url' => Request::url()])
				</div>



			</div>

			<div class="text-center">
				<a href="{{ url('/vauceri') }}">&laquo; Nazad na vaučerе</a>
			</div>

		</div>
	</div>

</section>

	@include('front.partials._footer')

@stop

@section('scripts')
    <script>
		(function(){
			var postText = $('.post-text');
			postText.find('img').addClass('img-responsive');

			var iframe = postText.find('iframe').addClass('embed-responsive-item');
			iframe.wrapAll('<div class="embed-responsive embed-responsive-16by9"></div>');


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click', '#download-va',function(e){

                e.preventDefault();

                var slug = $(this).data('slug');

                $.ajax({
                    url: '{!! url('/vaucer-download') !!}',
                    data: {slug:slug},
                    type: 'POST',
                    success: function (result) {
                        var $a = $('<a />', {
                            'href': result.url,
                            'download': 'vaucer.jpg',
                            'text': "click"
                        }).hide().appendTo("body")[0].click();
                    }
                });


                return false;

            });

		})();
	</script>
@stop