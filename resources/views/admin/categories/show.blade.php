@extends('admin.categories.layout')


@if( $categories->id !== 1)

@section('title')
{{ $categories->title }}
@overwrite

@section('body')

    @include('admin.categories.partials.path')

    <h1>{{ $categories->title }}</h1>

    <div class="form-group">

        <a class="btn btn-success" href="{{ route('admin.categories.edit', [ $categories->id ]) }}" title="Izmeni ovu kategoriju">
            <span class="glyphicon glyphicon-pencil"></span>&nbsp; &nbsp; Izmeni ovu kategoriju

        </a>

            {!! Form::open(['method' => 'DELETE', 'route' => ['admin.categories.destroy', $categories->id]]) !!}
            <button class="btn btn-danger" type="submit" onclick="return confirm('Da li ste sigurni ?')">
                <span class="glyphicon glyphicon-trash"></span>&nbsp; &nbsp;
                Obriši ovu kategoriju
            </button>
            {!! Form::close() !!}
    </div>

@overwrite
@endif

