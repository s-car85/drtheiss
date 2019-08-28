<div class="form-group">
    {!! Form::label('title', 'Naziv kategorije:') !!}
    {!! Form::text('title', null, [ 'class' => 'form-control', 'autofocus' => true ]) !!}
    {!! $errors->first('title') !!}
</div>


<div class="form-group">
    {!! Form::label('parent_id', 'Roditelj:') !!}
    {!! Form::select('parent_id', $categories, null, [ 'class' => 'form-control']) !!}
    {!! $errors->first('parent_id') !!}
    <span class="help-block">Za glavnu kategoriju izabrati Root</span>
</div>




