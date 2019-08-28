@extends('admin.layout')

@section('title')
    {{ trans('admin_message.sidebar.lectureevents') }}
@endsection

@section('heading')
    {{ trans('admin_message.sidebar.lectureevents') }}
@endsection

@section('style')

@endsection

@section('content')

    <div class="box box-primary">
        <div class="box-header">
            <h3>{{$lectureevents->exists ? trans('admin_message.lectureevents.edit') .' '.$lectureevents->post_title : trans('admin_message.lectureevents.create')}}</h3>
        </div>
        <div class="box-body">
            {!! Form::model($lectureevents, [
                'method' => $lectureevents->exists ? 'put' : 'post',
                'route'  => $lectureevents->exists ?
                 ['admin.lectureevents.update', $lectureevents->id]:
                 ['admin.lectureevents.store']
            ]) !!}

            <div class="form-group">
                {!! Form::label('title', trans('admin_message.lectureevents.title')) !!}
                {!! Form::text('title', null,['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('theme', trans('admin_message.lectureevents.theme')) !!}
                {!! Form::text('theme', null,['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('lecturers', trans('admin_message.lectureevents.lecturers')) !!}
                {!! Form::text('lecturers', null,['class' => 'form-control']) !!}
            </div>

            <div class="checkbox">
                <label>
                    {!! Form::checkbox('active') !!}
                    <b>{!! trans('admin_message.lectureevents.publish') !!}</b>
                </label>
            </div>



            {!! Form::submit($lectureevents->exists ? trans('admin_message.lectureevents.save') : trans('admin_message.lectureevents.add'), ['class' => 'btn btn-primary btn-flat']) !!}
            <a href="{!! url('admin/lectureevents') !!}" title="{{ trans('admin_message.cancel') }}" class="btn btn-danger btn-flat">{{ trans('admin_message.cancel') }}</a>
           {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('scripts')

@stop