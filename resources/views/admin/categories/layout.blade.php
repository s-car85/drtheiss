@extends('admin.layout')

@section('title')
    {{ trans('admin_message.sidebar.categories') }}
@endsection

@section('heading')
    {{ trans('admin_message.sidebar.categories') }}
@endsection

@section('style')
<style>
    table.dataTable tbody td:nth-child(5) {
      word-break: break-word;
      vertical-align: top;
    }
    .category-tree {
  margin: 0;
  padding: 0;
  list-style-type: none;
}
.category-tree > li > .actions {
  float: right;
  opacity: 0;
  transition: opacity 100ms ease-in;
}
.category-tree > li > .actions > a {
  text-decoration: none;
}
.category-tree > li:hover > .actions {
  opacity: 1;
}
.category-tree > li > .category-tree {
  margin-left: 15px;
}
.category-tree > li.active > .title {
  font-weight: bold;
}

</style>
@endsection

@section('content')
    <div class="row">
            <div class="col-md-4">
                <h2>
                    Dodaj kategoriju

                    <small>
                        <a href="{{ route('admin.categories.create') }}" title="Dodaj novu kategoriju">
                            <span class="glyphicon glyphicon-plus"></span>
                        </a>
                    </small>
                </h2>


                    <section class="panel panel-default">
                        <header class="panel-heading">
                        <h3 class="panel-title">Stablo</h3></header>
                        <div class="panel-body">
                            @include('admin.categories.partials.tree')
                        </div>
                    </section>

            </div>

            <div class="col-md-8">
                <h2>@yield('title')</h2>

                @yield('body')
            </div>
    </div>
@overwrite


@section('scripts')
    {{--<script src="{!! asset('js/fontawesome-iconpicker.min.js')!!}"></script>--}}
    <script>
        (function(){


//            $( "#parent_id" )
//                .change(function () {
//                   var str = $( "select option:selected" ).val();
//                     if(str == 1){
//                         $('#class-input').show();
//                     }else{
//                         $('#class-input').hide();
//                     }
//                })
//                .change();

//            $('.icp-auto').iconpicker({
//                templates: {
//                    popover: '<div class="iconpicker-popover popover"><div class="arrow"></div>' +
//                    '<div class="popover-title"></div><div class="popover-content"></div></div>',
//                    footer: '<div class="popover-footer"></div>',
//                    buttons: '<button class="iconpicker-btn iconpicker-btn-cancel btn btn-default btn-sm">Cancel</button>' +
//                    ' <button class="iconpicker-btn iconpicker-btn-accept btn btn-primary btn-sm">Accept</button>',
//                    search: '<input type="search" class="form-control iconpicker-search" placeholder="Pretraga ikona" />',
//                    iconpicker: '<div class="iconpicker"><div class="iconpicker-items"></div></div>',
//                    iconpickerItem: '<a role="button" href="#" class="iconpicker-item"><i></i></a>',
//                }
//            });
//
//            // Events sample:
//            // This event is only triggered when the actual input value is changed
//            // by user interaction
//            $('.icp').on('iconpickerSelected', function(e) {
//                $('.lead .picker-target').get(0).className = 'picker-target fa-3x ' +
//                        e.iconpickerInstance.options.iconBaseClass + ' ' +
//                        e.iconpickerInstance.getValue(e.iconpickerValue);
//            });



        })();
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

