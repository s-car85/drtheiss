@extends('master')

@section('title', 'Blog -')

@section('description', 'Dr Theiss" iz Nemačke, vodeći svetski proizvođač lekova na bazi bilja i fitoterapeutskih preparata.')


@section('style')
	<style>
		body{
			background: #eee;
		}

		.ias-spinner, .ias-noneleft {
		  position: absolute;
		  bottom: -30px;
		  width: 100%;
		  text-align: center;
		  margin-left: -16px;
		}
		.pagination{
			visibility: hidden;
		}

		/**** Infinite Scroll ****/
		#infscr-loading {
			 margin: 0 auto;
			text-align: center;
			z-index: 100;
			padding-bottom: 60px;
		}
		#infscr-loading img {
			margin: 0 auto;
			display: block;
		}
  </style>
@stop

@section('content')

@include('front.partials._header')

<section class="posts-wrap ">
	<div class="container no-padding">


	<div class="col-md-12 product-wraper">


			  <h1 class="blog-title-big text-center" >Blog</h1>




				<div class="search-form2">
					 {!! Form::open(['url'=>'blog/pretraga','method'=>'GET']) !!}
						<div id="search-input2">
							 <label for="search-input2">
								 <i class="fa fa-search" aria-hidden="true"></i>
								 <span class="sr-only">PRETRAŽI BLOG</span>
							 </label>
							<input class="form-control form-rounded" type="search" name="q" placeholder="PRETRAŽI BLOG" value="{{isset($term) ? $term : ''}}">
						</div>
					 {!! Form::close() !!}
				</div>


			<div class="clearfix"></div>

			 <div class="load_more">
			     <ul id="myList" style="margin-bottom: 100px; padding-top: 40px;"
					 class="endless-pagination"
					 data-next-page="{{ $posts->nextPageUrl() }}">
			        <!-- These are our grid blocks -->

					 @include('front.posts.posts')


					<div class="clearfix"></div>
					 <!----//--->


					 {{ $posts->links() }}

					 <a href="{{ $posts->nextPageUrl() }}" class="next-page"></a>
				 </ul>

			 </div>
	</div>
</div>

</section>




@include('front.partials._footer')

@stop

@section('scripts')
	<script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
	<script src="https://unpkg.com/masonry-layout@4.1/dist/masonry.pkgd.min.js"></script>
	<script src="{{ asset('js/jquery.infinitescroll.min.js') }}"></script>
	<script>

		$(document).on('click', '.socials2 ul > li > a', function(e){

            var verticalPos = Math.floor(($(window).width() - popupSize.width) / 2),
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
	<script type="text/javascript">

		  $(document).ready(function() {

			var $container = $('#myList');


				  var $grid = $container.masonry({
					  // options...
					  itemSelector: '.grid-item',
                      gutter: 20,
                      horizontalOrder: true,
                      fitWidth: true
				  });

			  		$grid.imagesLoaded( function() {
							$grid.masonry();
					});


				  $('.load_more').infinitescroll({
					  loading: {
						  speed: 0,
						  msgText: '',
						  img: '{{ asset('img/loading.gif') }}'
					  },
					  navSelector: ".pagination",
					  nextSelector: ".next-page",
					  itemSelector: ".grid-item",
					  dataType: 'json',
					  appendCallback: false,
				  }, function (response) {

					  var $content = $(response.posts);
					  	$grid.append($content).masonry('appended', $content);

					    $grid.imagesLoaded( function() {
							$grid.masonry();
							  if (response.next_page == null) {
								  $(window).unbind('.infscr');
								  $('#infscr-loading').show().html(' ');
							  }
					   	});

				  });




//			$(window).scroll(fetchPosts);
//
//			function fetchPosts() {
//
//				var page = $('.endless-pagination').data('next-page');
//
//				var ajaxRunning = false;
//
//				if(page !== null && !ajaxRunning) {
//
//
//					clearTimeout( $.data( this, "scrollCheck" ) );
//
//					$.data( this, "scrollCheck", setTimeout(function() {
//
//						var scroll_position_for_posts_load = $(window).height() + $(window).scrollTop() + $('#footer-wrap').height() + 500;
//
//						console.log(scroll_position_for_posts_load);
//
//						if(scroll_position_for_posts_load >= $(document).height()) {
//
//							 ajaxRunning = true;
//
//							$.ajax(page, {
//								asynchronous:true,
//								evalScripts:true,
//								method:'get',
//							beforeSend: function(){
//								//$('.spinner').show();
//							},
//							success: function(data, textStatus, jqXHR) {
//									 var $content = $( data.posts );
//									 $grid.append( $content ).masonry( 'appended', $content );
//									 $grid.masonry();
//									$('.endless-pagination').data('next-page', data.next_page);
//							},
//							complete: function() {
//								ajaxRunning = false;
//								clearTimeout($.data( this, "scrollCheck" ));
//								},
//							});
//
//
////							if(!ajaxRunning){
////								ajaxRunning = true;
////								$.get(page, function(data){
////
////									var $content = $( data.posts );
////									 $grid.append( $content ).masonry( 'appended', $content );
////									 $grid.masonry();
////
////									$('.endless-pagination').data('next-page', data.next_page);
////
////								}).always(function() {
////									 ajaxRunning = false;
////								});
////							}
//
//						}
//
//
//					}, 300))
//
//				}
//			}


		});

	</script>
@stop