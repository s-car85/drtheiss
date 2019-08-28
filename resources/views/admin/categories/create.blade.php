@extends('admin.categories.layout')

@section('title')
Nova kategorija
@overwrite

@section('body')
    {!! Form::model($data, [ 'route' => 'admin.categories.store' ]) !!}

        @include('admin.categories.partials._form')

        <div class="form-group">
            <div class="col-md-12">
                {!! Form::label('image', 'Logo Kategorije:')!!}
                <button type="button" onclick="BrowseServer('logo');" class="btn btn-info btn-raised">Izaberi Logo (samo za glavnu kat.)</button>
                {!! Form::hidden('logo', null,['class'=>'form-control', 'id'=>'logo']) !!}
                <img id="1logo" class="img-thumbnail" width="140px" height="140px"  src="https://placeholdit.imgix.net/~text?txtsize=25&txt=Logo&w=150&h=70" alt="Slika">
            </div>
        </div>


        <div class="form-group">
            <div class="col-md-12">
                {!! Form::label('image', 'Velika Slika Kategorije:')!!}
                <button type="button" onclick="BrowseServer('image');" class="btn btn-info btn-raised">Izaberi Veliku Sliku (1177x520)</button>
                {!! Form::hidden('image', null,['class'=>'form-control', 'id'=>'image']) !!}
                <img id="1image" class="img-thumbnail" width="140px" height="140px"  src="https://placeholdit.imgix.net/~text?txtsize=25&txt=Velika%20Slika&w=150&h=70" alt="Slika">
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-12">
                {!! Form::label('simage', 'Mala Slika Kategorije:')!!}
                <button type="button" onclick="BrowseServer('simage');" class="btn btn-info btn-raised">Izaberi Malu Sliku (*za potkategorije 300x200)</button>
                {!! Form::hidden('simage', null,['class'=>'form-control', 'id'=>'simage']) !!}
                <img id="1simage" class="img-thumbnail" width="140px" height="140px"  src="https://placeholdit.imgix.net/~text?txtsize=25&txt=Mala%20Slika&w=150&h=100" alt="Slika">
            </div>
        </div>


        <div class="form-group">
            {!! Form::submit('Dodaj', [ 'class' => 'btn btn-primary'] ) !!}
            <a href="{{ route('admin.categories.index') }}" class="btn btn-defalut">
                Otkaži
            </a>
        </div>
    {!! Form::close() !!}
@overwrite

