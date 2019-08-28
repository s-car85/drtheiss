@extends('admin.layout')

@section('title')
    {{ trans('admin_message.sidebar.products') }}
@endsection

@section('heading')
    {{ trans('admin_message.sidebar.products') }}
@endsection

@section('style')
<link rel="stylesheet" href="{!! asset('css/fileinput.min.css') !!}" type="text/css" charset="utf-8" />
@endsection

@section('content')

    <div class="box box-primary">
        <div class="box-header">
            <h3>{{$product->exists ? trans('admin_message.products.edit_product') .' '.$product->title : trans('admin_message.products.create_product')}}</h3>
        </div>
        <div class="box-body">
            {!! Form::model($product, [
                'files' => true,
                'method' => $product->exists ? 'put' : 'post',
                'route'  => $product->exists ?
                 ['admin.products.update', $product->id]:
                 ['admin.products.store']
            ]) !!}

            <div class="form-group">
                {!! Form::label('category_id', trans('admin_message.products.category')) !!}
                {!! Form::select('category_id', $categories, null, [ 'class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('title', trans('admin_message.products.title')) !!}
                {!! Form::text('title', null,['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('short_description', trans('admin_message.products.short_description')) !!}
                {!! Form::text('short_description', null,['class' => 'form-control']) !!}

            </div>

             {{--<div class="form-group">--}}
                 {{--<span class="help-block">(*1177x520)</span>--}}
                {{--{!! Form::label('image', trans('admin_message.products.image')) !!}--}}
                {{--{!! Form::text('image', null,['class' => 'form-control']) !!}--}}
            {{--</div>--}}

            <div class="form-group">
                <div class="col-md-12">
                    {!! Form::label('image', 'Velika Slika Proizvoda:')!!}
                    <button type="button" onclick="BrowseServer('image');" class="btn btn-info btn-raised">Izaberi Veliku Sliku (1177x520)</button>
                    {!! Form::hidden('image', null,['class'=>'form-control', 'id'=>'image']) !!}
                    @if(!$product->exists)
                    <img id="1image" class="img-thumbnail" width="140px" height="140px"  src="https://placeholdit.imgix.net/~text?txtsize=25&txt=Velika%20Slika&w=150&h=70" alt="Slika">
                    @else
                    <img id="1image" class="img-thumbnail" width="140px" height="140px"  src="{!! $product->image !!}" alt="Slika">
                    @endif
                </div>
            </div>

            <div class="form-group">
                 <span class="help-block">(*400x300)</span>
                 {!! Form::label('product_image', trans('admin_message.products.product_image')) !!}
                 {!! Form::file('product_image', ['class' => 'file', 'data-preview-file-type' => 'text', 'accept' => 'image/*']) !!}
            </div>

             <div class="form-group">
                {!! Form::label('description', trans('admin_message.products.description')) !!}
                {!! Form::textarea('description', null,['class' => 'form-control tinymce']) !!}
             </div>

            <div class="checkbox">
                <label>
                    {!! Form::checkbox('active') !!}
                    <b>{!! trans('admin_message.products.active') !!}</b>
                </label>
            </div>

            {!! Form::submit($product->exists ? trans('admin_message.products.save_product') : trans('admin_message.products.create_product'), ['class' => 'btn btn-primary btn-flat']) !!}
            <a href="{!! url('admin/products') !!}" title="{{ trans('admin_message.cancel') }}" class="btn btn-danger btn-flat">{{ trans('admin_message.cancel') }}</a>
           {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{!! asset('js/fileinput.min.js') !!}"></script>
    <script src="{!! asset('js/fileinput_locale_sr.js') !!}"></script>

    <script>
        $('input[name=title]').on('blur', function(){
           var slugElement = $('input[name=slug]');
            if(slugElement.val()){
                return;
            }
            slugElement.val(this.value.toLowerCase().replace(/[^a-z0-9-]+/g, '-').replace(/^-+|-+$/g, ''));
        });

        // initialize fileinputs
        $("#product_image").fileinput({
            language: "sr",
            showUpload: false,
            showCaption: false,
            allowedFileExtensions: ["jpg", "jpeg", "png", "gif"],
            previewFileType: "image",
            maxFileSize: 2000,
            browseLabel: 'Izaberi',
            @if($product->exists && $product->product_image !== '/uploads/products/no-image.jpg')
            initialPreview: [
                '<img src="{!! asset($product->product_image) !!}" class="file-preview-image">'
            ],
            initialPreviewConfig: [
                {
                    url: "/admin/image-product",
                    extra: {
                        pos: 0,
                        _token: "{{ csrf_token() }}",
                        _method: "DELETE",
                        product_id: "{{$product->id}}"
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
    <script type="text/javascript">
        // File Picker modification for FCK Editor v2.0 - www.fckeditor.net
        // by: Pete Forde <pete@unspace.ca> @ Unspace Interactive
        var urlobj;

        function BrowseServer(obj)
        {
            urlobj = obj;
            OpenServerBrowser(
                    '/filemanager/index.html',
                    screen.width * 0.7,
                    screen.height * 0.7 ) ;
        }

        function OpenServerBrowser( url, width, height )
        {
            var iLeft = (screen.width - width) / 2 ;
            var iTop = (screen.height - height) / 2 ;
            var sOptions = "toolbar=no,status=no,resizable=yes,dependent=yes" ;
            sOptions += ",width=" + width ;
            sOptions += ",height=" + height ;
            sOptions += ",left=" + iLeft ;
            sOptions += ",top=" + iTop ;
            var oWindow = window.open( url, "BrowseWindow", sOptions ) ;
        }

        function SetUrl( url, width, height, alt )
        {
            document.getElementById(urlobj).value = url ;
            $('#1'+urlobj).attr('src', url);
            oWindow = null;
        }
    </script>
@stop