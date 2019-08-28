@extends('admin.layout')

@section('title')
    {{ trans('admin_message.sidebar.nvaucers') }}
@endsection

@section('heading')
    {{ trans('admin_message.sidebar.nvaucers') }}
@endsection

@section('style')
<link rel="stylesheet" href="{!! asset('css/fileinput.min.css') !!}" type="text/css" charset="utf-8" />
@endsection

@section('content')

    <div class="box box-primary">
        <div class="box-header">
            <h3>{{$vaucer->exists ? trans('admin_message.vaucers.edit_vaucer') .' '.$vaucer->vaucer_title : trans('admin_message.vaucers.create_vaucer')}}</h3>
        </div>
        <div class="box-body">
            {!! Form::model($vaucer, [
                'files' => true,
                'method' => $vaucer->exists ? 'put' : 'vaucer',
                'route'  => $vaucer->exists ?
                 ['admin.vaucers.update', $vaucer->id]:
                 ['admin.vaucers.store']
            ]) !!}
            <div class="form-group">
                {!! Form::label('vaucer_title', trans('admin_message.vaucers.vaucer_title')) !!}
                {!! Form::text('vaucer_title', null,['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('slug', trans('admin_message.vaucers.slug')) !!}
                {!! Form::text('slug', null,['class' => 'form-control']) !!}
            </div>
             <div class="form-group">
                {!! Form::label('vaucer_desc', trans('admin_message.vaucers.vaucer_desc')) !!}
                {!! Form::text('vaucer_desc', null,['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('vaucer_banner', trans('admin_message.vaucers.vaucer_banner')) !!}
                {!! Form::file('vaucer_banner', ['class' => 'file', 'data-preview-file-type' => 'text', 'accept' => 'image/*']) !!}
            </div>

            <div class="form-group">
                 {!! Form::label('vaucer_image', trans('admin_message.vaucers.vaucer_image')) !!}
                 {!! Form::file('vaucer_image', ['class' => 'file', 'data-preview-file-type' => 'text', 'accept' => 'image/*']) !!}
            </div>

             <div class="form-group">
                {!! Form::label('vaucer_body', trans('admin_message.vaucers.vaucer_body')) !!}
                {!! Form::textarea('vaucer_body', null,['class' => 'form-control tinymce']) !!}
             </div>

            <div class="checkbox">
                <label>
                    {!! Form::checkbox('active') !!}
                    <b>{!! trans('admin_message.vaucers.publish') !!}</b>
                </label>
            </div>

            {!! Form::submit($vaucer->exists ? trans('admin_message.vaucers.save_vaucer') : trans('admin_message.vaucers.create_vaucer'), ['class' => 'btn btn-primary btn-flat']) !!}
            <a href="{!! url('admin/vaucers') !!}" title="{{ trans('admin_message.cancel') }}" class="btn btn-danger btn-flat">{{ trans('admin_message.cancel') }}</a>
           {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{!! asset('js/fileinput.min.js') !!}"></script>
    <script src="{!! asset('js/fileinput_locale_sr.js') !!}"></script>

    <script>
        $('input[name=vaucer_title]').on('blur', function(){
           var slugElement = $('input[name=slug]');
            if(slugElement.val()){
                return;
            }
            slugElement.val(this.value.toLowerCase().replace(/[^a-z0-9-]+/g, '-').replace(/^-+|-+$/g, ''));
        });

        // initialize fileinputs
        $("#vaucer_image").fileinput({
            language: "sr",
            showUpload: false,
            showCaption: false,
            allowedFileExtensions: ["jpg", "jpeg", "png", "gif"],
            previewFileType: "image",
            maxFileSize: 2000,
            browseLabel: 'Izaberi',
            @if($vaucer->exists && $vaucer->vaucer_image != null)
            initialPreview: [
                '<img src="{!! asset($vaucer->vaucer_image) !!}" class="file-preview-image">'
            ],
            initialPreviewConfig: [
                {
                    url: "/admin/image-vaucer",
                    extra: {
                        pos: 0,
                        _token: "{{ csrf_token() }}",
                        _method: "DELETE",
                        vaucer_id: "{{$vaucer->id}}"
                    }
                }
            ]
            @endif
        });

        $("#vaucer_banner").fileinput({
            language: "sr",
            showUpload: false,
            showCaption: false,
            allowedFileExtensions: ["jpg", "jpeg", "png", "gif"],
            previewFileType: "image",
            maxFileSize: 2000,
            browseLabel: 'Izaberi',
            @if($vaucer->exists && $vaucer->vaucer_banner != null)
            initialPreview: [
                '<img src="{!! asset($vaucer->vaucer_banner) !!}" class="file-preview-image">'
            ],
            initialPreviewConfig: [
                {
                    url: "/admin/image-vaucer-banner",
                    extra: {
                        pos: 0,
                        _token: "{{ csrf_token() }}",
                        _method: "DELETE",
                        vaucer_id: "{{$vaucer->id}}"
                    }
                }
            ]
            @endif
        });
    </script>

    <script type="text/javascript" src="{{ asset(config('tinymce.cdn')) }}"></script>
    <script type="text/javascript">

        @if(isset($els))
            @foreach($els as $el)
                tinymce.init(
                    {!! json_encode(config('tinymce.'.$el)) !!}
                );
            @endforeach
        @else
            tinymce.init(
                {!! json_encode(config('tinymce.default')) !!}
            );
        @endif

    </script>
@stop