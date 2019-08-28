
@extends('admin.template')

@section('head')
    <meta charset=utf-8 />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="/assets/site.min.css">
@stop


@section('main')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Kategorije
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <span class="fa fa-sitemap"></span> Kategorije
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="loading">
                <div class="spinner">
                    <div class="mask">
                        <div class="maskedCircle"></div>
                    </div>
                </div>
            </div>
            <a href="#" class="newCategory">Dodaj novu kategoriju</a>
            <div id="tree"></div>


        </div>
    </div>

@stop

@section('scripts')
    <script type="text/javascript">
        var data = {!! $categoriesData !!};
        var serverUrl = "{!! Request::url() !!}";
        function run() {
            var a = document.createElement("script");
            a.src ="/assets/all-admin.js", document.body.appendChild(a)
        }
        window.addEventListener ? window.addEventListener("load", run, !1) : window.attachEvent ? window.attachEvent("onload", run) : window.onload = run;
    </script>
@stop

@stop
