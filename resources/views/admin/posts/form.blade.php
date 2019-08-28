@extends('admin.layout')

@section('title')
    {{ trans('admin_message.sidebar.nposts') }}
@endsection

@section('heading')
    {{ trans('admin_message.sidebar.nposts') }}
@endsection

@section('style')
<link rel="stylesheet" href="{!! asset('css/fileinput.min.css') !!}" type="text/css" charset="utf-8" />
@endsection

@section('content')

    <div class="box box-primary">
        <div class="box-header">
            <h3>{{$post->exists ? trans('admin_message.posts.edit_post') .' '.$post->post_title : trans('admin_message.posts.create_post')}}</h3>
        </div>
        <div class="box-body">
            {!! Form::model($post, [
                'files' => true,
                'method' => $post->exists ? 'put' : 'post',
                'route'  => $post->exists ?
                 ['admin.posts.update', $post->id]:
                 ['admin.posts.store']
            ]) !!}
            <div class="form-group">
                {!! Form::label('post_title', trans('admin_message.posts.post_title')) !!}
                {!! Form::text('post_title', null,['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('slug', trans('admin_message.posts.slug')) !!}
                {!! Form::text('slug', null,['class' => 'form-control']) !!}
            </div>
             <div class="form-group">
                {!! Form::label('post_desc', trans('admin_message.posts.post_desc')) !!}
                {!! Form::text('post_desc', null,['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                 {!! Form::label('post_image', trans('admin_message.posts.post_image')) !!}
                 {!! Form::file('post_image', ['class' => 'file', 'data-preview-file-type' => 'text', 'accept' => 'image/*']) !!}
            </div>

             <div class="form-group">
                {!! Form::label('post_body', trans('admin_message.posts.post_body')) !!}
                {!! Form::textarea('post_body', null,['class' => 'form-control tinymce']) !!}
             </div>

            <div class="checkbox">
                <label>
                    {!! Form::checkbox('active') !!}
                    <b>{!! trans('admin_message.posts.publish') !!}</b>
                </label>
            </div>

            {!! Form::submit($post->exists ? trans('admin_message.posts.save_post') : trans('admin_message.posts.create_post'), ['class' => 'btn btn-primary btn-flat']) !!}
            <a href="{!! url('admin/posts') !!}" title="{{ trans('admin_message.cancel') }}" class="btn btn-danger btn-flat">{{ trans('admin_message.cancel') }}</a>
           {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{!! asset('js/fileinput.min.js') !!}"></script>
    <script src="{!! asset('js/fileinput_locale_sr.js') !!}"></script>

    <script>
        $('input[name=post_title]').on('blur', function(){
           var slugElement = $('input[name=slug]');
            if(slugElement.val()){
                return;
            }
            slugElement.val(this.value.toLowerCase().replace(/[^a-z0-9-]+/g, '-').replace(/^-+|-+$/g, ''));
        });

        // initialize fileinputs
        $("#post_image").fileinput({
            language: "sr",
            showUpload: false,
            showCaption: false,
            allowedFileExtensions: ["jpg", "jpeg", "png", "gif"],
            previewFileType: "image",
            maxFileSize: 2000,
            browseLabel: 'Izaberi',
            @if($post->exists && $post->post_image != null)
            initialPreview: [
                '<img src="{!! asset($post->post_image) !!}" class="file-preview-image">'
            ],
            initialPreviewConfig: [
                {
                    url: "/admin/image-post",
                    extra: {
                        pos: 0,
                        _token: "{{ csrf_token() }}",
                        _method: "DELETE",
                        post_id: "{{$post->id}}"
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