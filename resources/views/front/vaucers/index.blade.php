@extends('master')

@section('title', 'Vaučeri -')

@section('description', 'Dr Theiss" iz Nemačke, vodeći svetski proizvođač lekova na bazi bilja i fitoterapeutskih preparata.')


@section('style')
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<style>
		body{
			background: #eee;
		}
		.post{
			width: 450px;
		}
		.post-image{
			height: 300px;
		}

		@media (max-width: 768px){
			.post{
				width: 100%;
			}
			.post-image{
				height: 200px;
			}
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


		@if(count($vaucers)>0)

			<div class="clearfix"></div>

			 <div class="load_more">
			     <ul id="myList" style="margin-bottom: 100px; padding-top: 40px;"
					 class="endless-pagination"
					 data-next-page="{{ $vaucers->nextPageUrl() }}">
			        <!-- These are our grid blocks -->

					 @include('front.vaucers.vaucers')


					<div class="clearfix"></div>
					 <!----//--->


					 {{ $vaucers->links() }}

					 <a href="{{ $vaucers->nextPageUrl() }}" class="next-page"></a>
				 </ul>

			 </div>

		@else

			<div style="padding-top: 150px; padding-bottom: 150px;">
				<h3>Blagovremeno posetite ovu stranu, očekuju Vas brojna iznenađenja.<br><br>
					Hvala na razumevanju, <br>DrTheiss stručni tim.
				</h3>
			</div>

		@endif
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


		});


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

	</script>
@stop