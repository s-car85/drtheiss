@extends('admin.layout')

@section('title')
	{{ trans('admin_message.dashboard') }}
@endsection

@section('heading')
	{{ trans('admin_message.dashboard') }}
@endsection

@section('content')
		<div class="row">

			@include('admin.partials._small-box',['color' => 'green', 'icon' => 'ion-clipboard', 'nbr' => $nbrLectures, 'name' => trans('admin_message.sidebar.lectures'), 'href' => 'admin/lectures'])

			@include('admin.partials._small-box',['color' => 'yellow', 'icon' => 'ion-ios-email', 'nbr' => $contacts->count(), 'name' => trans('admin_message.sidebar.contacts'), 'href' => 'admin/contacts'])

			@include('admin.partials._small-box',['color' => 'red', 'icon' => 'ion-ios-paper', 'nbr' => $nbrPosts, 'name' => trans('admin_message.sidebar.cposts'), 'href' => 'admin/posts'])

			@include('admin.partials._small-box',['color' => 'aqua', 'icon' => 'ion-ios-person', 'nbr' => $nbrUsers, 'name' => trans('admin_message.sidebar.cusers'), 'href' => 'admin/users'])


		</div>
		<div class="row">

		<div class="col-lg-4 col-xs-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<i class="fa fa-cloud"></i>

					<h3 class="box-title">{{ trans('admin_message.weather') }}</h3>
				</div>
				<div class="box-body">
					<div id="weather"></div>
				</div>
			</div>
		</div>


		<div class="col-lg-4 col-xs-12">
			<div class="box box-info">
				<div class="box-header with-border">
					<i class="fa fa-line-chart"></i>

					<h3 class="box-title">{{ trans('admin_message.currency_list') }}</h3>
				</div>
				<div class="box-body text-center">
					<iframe src="https://www.kursna-lista.info/resources/kursna-lista.php?format=4&br_decimala=4&promene=1&procenat=1"
						width="320px" height="220px" frameborder="0" scrolling="no"></iframe>
				</div>
			</div>
		</div>




		</div>

@endsection


@section('scripts')

	<script src="{!! asset('//cdnjs.cloudflare.com/ajax/libs/jquery.simpleWeather/3.1.0/jquery.simpleWeather.min.js')!!}"></script>
	<script>
		// Docs at http://simpleweatherjs.com
		$(document).ready(function() {
			$.simpleWeather({
				location: 'Belgrade, RS',
				woeid: '',
				unit: 'c',
				success: function(weather) {
					html = '<p class="text-right" style="padding-right: 20px;color: #fff;">'+weather.forecast[0].date+'</p>';
					html += '<h2 class="text-center"><img src="'+weather.image+'" />'+weather.temp+'&deg;'+weather.units.temp+'</h2>';

					$("#weather").html(html);
				},
				error: function(error) {
					$("#weather").html('<p>'+error+'</p>');
				}
			});
		});

	</script>


@stop