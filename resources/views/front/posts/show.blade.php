@extends('master')

@section('title', $post->post_title .' -')

@section('description', $post->post_desc)

@section('og-title', $post->post_title)
@section('og-description', $post->post_desc)
@if($post->post_image != null)
	@section('og-image',  asset($post->post_image))
@endif

@section('style')
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

			<h1 class="blog-title-big text-center">{{ $post->post_title }} </h1>
			<p class="adm text-center">Postovano: {{ $post->created_at }}</p>

			<div class="col-md-12 inner-post">

				@if($post->post_image != null)
					<img src="{{ asset($post->post_image) }}" class="img-responsive" style="max-height: 500px;" alt="{{ $post->post_title }}">
				@endif

				<div class="post-text product-body">
					{!! $post->post_body !!}
					<div class="clearfix"></div>
				</div>

				<div class="socials" style="padding-left: 0;">
				  <span>Podeli sa prijateljima</span> <br>
					 @include('front.partials._socials',['url' => Request::url()])
				</div>

			</div>

			<div class="text-center">
				<a href="{{ url('/blog') }}">&laquo; Nazad na blog</a>
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
		})();
	</script>
@stop