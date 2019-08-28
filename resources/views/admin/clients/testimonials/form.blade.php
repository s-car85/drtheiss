@extends('admin.layout')

@section('title')
    {{ trans('admin_message.sidebar.client.testimonials') }}
@endsection

@section('heading')
    {{ trans('admin_message.sidebar.client.testimonials') }}
@endsection

@section('style')
    <link rel="stylesheet" href="{!! asset('css/fileinput.min.css') !!}" type="text/css" charset="utf-8" />
@stop

@section('content')

    <div class="box box-primary">
        <div class="box-header">
            <h3>{{$testimonial->exists ? trans('admin_message.testimonials.hedit') .' '.$testimonial->name : trans('admin_message.testimonials.create')}}</h3>
        </div>
        <div class="box-body">
            {!! Form::model($testimonial, [
                'method' => $testimonial->exists ? 'put' : 'post',
                'route'  => $testimonial->exists ?
                 ['admin.testimonials.update', $testimonial->id]:
                 ['admin.testimonials.store'],
                 'files' => true
            ]) !!}
            <div class="form-group">
                {!! Form::label('name', trans('admin_message.testimonials.name')) !!}
                {!! Form::text('name', null,['class' => 'form-control']) !!}
            </div>

           <div class="form-group">
                {!! Form::label('profession', trans('admin_message.testimonials.profession')) !!}
                {!! Form::text('profession', null,['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('body',trans('admin_message.testimonials.body')) !!}
                {!! Form::textarea('body', null,['class' => 'form-control']) !!}
            </div>

              <div class="form-group">
                {!! Form::label('avatar', trans('admin_message.testimonials.avatar')) !!}
                   {!! Form::file('avatar', ['class' => 'file', 'data-preview-file-type' => 'text', 'accept' => 'image/*']) !!}
              </div>

            {!! Form::submit($testimonial->exists ? trans('admin_message.testimonials.save') : trans('admin_message.testimonials.create'), ['class' => 'btn btn-primary btn-flat']) !!}
            <a href="{!! url('admin/testimonials') !!}" title="{{ trans('admin_message.cancel') }}" class="btn btn-danger btn-flat">{{ trans('admin_message.cancel') }}</a>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{!! asset('js/fileinput.min.js') !!}"></script>
    <script src="{!! asset('js/fileinput_locale_sr.js') !!}"></script>

    <script>
        // initialize fileinputs
        $("#avatar").fileinput({
            language: "sr",
            showUpload: false,
            showCaption: false,
            allowedFileExtensions: ["jpg", "jpeg", "png", "gif"],
            previewFileType: "image",
            maxFileSize: 2000,
            browseLabel: 'Izaberi',
            @if($testimonial->exists && $testimonial->avatar != null)
            initialPreview: [
                '<img src="{!! asset($testimonial->avatar) !!}" class="file-preview-image">'
            ],
            initialPreviewConfig: [
                {
                    url: "/admin/image-testimonials",
                    extra: {
                        pos: 0,
                        _token: "{{ csrf_token() }}",
                        _method: "DELETE",
                        testimonial_id: "{{$testimonial->id}}"
                    }
                }
            ]
            @endif
        });
    </script>

@stop