@extends('admin.layout')

@section('title')
    {{ trans('admin_message.sidebar.filemanager') }}
@endsection

@section('heading')
    {{ trans('admin_message.sidebar.filemanager') }}
@endsection

@section('style')
<style>

		.iframe-responsive-wrapper {
			position: relative;
		}

		.iframe-responsive-wrapper .iframe-ratio {
			display: block;
			width: 100%;
			height: auto;
		}

		.iframe-responsive-wrapper iframe {
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
            min-height: 800px;
		}
</style>
@endsection

@section('content')

    <div class="iframe-responsive-wrapper">
		<img class="iframe-ratio" src="data:image/gif;base64,R0lGODlhEAAJAIAAAP///wAAACH5BAEAAAAALAAAAAAQAAkAAAIKhI+py+0Po5yUFQA7"/>
		<iframe scrolling="no" src="{!! url($url) !!}" width="640" height="400" frameborder="2" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
	</div>

@stop
