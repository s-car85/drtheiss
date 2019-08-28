@extends('admin.layout')

@section('title')
    {{ trans('admin_message.sidebar.client.logos') }}
@endsection

@section('heading')
    {{ trans('admin_message.sidebar.client.logos') }}
@endsection

@section('style')
    <link rel="stylesheet" href="{!! asset('css/fileinput.min.css') !!}" type="text/css" charset="utf-8" />
@stop

@section('content')

    <div class="box box-primary">
        <div class="box-header">
            <h3>{{$logo->exists ? trans('admin_message.clientlogos.cedit') .' '.$logo->title : trans('admin_message.clientlogos.create')}}</h3>
        </div>
        <div class="box-body">
            {!! Form::model($logo, [
                'method' => $logo->exists ? 'put' : 'post',
                'route'  => $logo->exists ?
                 ['admin.clientlogos.update', $logo->id]:
                 ['admin.clientlogos.store'],
                 'files' => true
            ]) !!}
            <div class="form-group">
                {!! Form::label('title', trans('admin_message.clientlogos.title')) !!}
                {!! Form::text('title', null,['class' => 'form-control']) !!}
            </div>

           <div class="form-group">
                {!! Form::label('url', trans('admin_message.clientlogos.url')) !!}
                {!! Form::text('url', null,['class' => 'form-control']) !!}
            </div>

              <div class="form-group">
                {!! Form::label('logo', trans('admin_message.clientlogos.logo')) !!}
                {!! Form::file('logo', ['class' => 'file', 'data-preview-file-type' => 'text', 'accept' => 'image/*']) !!}
              </div>

            {!! Form::submit($logo->exists ? trans('admin_message.clientlogos.save') : trans('admin_message.clientlogos.create'), ['class' => 'btn btn-primary btn-flat']) !!}
            <a href="{!! url('admin/clientlogos') !!}" title="{{ trans('admin_message.cancel') }}" class="btn btn-danger btn-flat">{{ trans('admin_message.cancel') }}</a>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{!! asset('js/fileinput.min.js') !!}"></script>
    <script src="{!! asset('js/fileinput_locale_sr.js') !!}"></script>

    <script>
        // initialize fileinputs
        $("#logo").fileinput({
            language: "sr",
            showUpload: false,
            showCaption: false,
            allowedFileExtensions: ["jpg", "jpeg", "png", "gif"],
            previewFileType: "image",
            maxFileSize: 2000,
            browseLabel: 'Izaberi',
            @if($logo->exists && $logo->logo != null)
            initialPreview: [
                '<img src="{!! asset($logo->logo) !!}" class="file-preview-image">'
            ],
            initialPreviewConfig: [
                {
                    url: "/admin/image-logos",
                    extra: {
                        pos: 0,
                        _token: "{{ csrf_token() }}",
                        _method: "DELETE",
                        logo_id: "{{$logo->id}}"
                    }
                }
            ]
            @endif
        });
    </script>

@stop