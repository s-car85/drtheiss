@extends('admin.layout')

@section('title')
    {{ trans('admin_message.sidebar.users') }}
@endsection

@section('heading')
    {{ trans('admin_message.sidebar.users') }}
@endsection

@section('content')

    <div class="box box-primary">
        <div class="box-header">
            <h3>{{$user->exists ? trans('admin_message.users.hedit') .' '.$user->name : trans('admin_message.users.create_user')}}</h3>
        </div>
        <div class="box-body">
            {!! Form::model($user, [
                'method' => $user->exists ? 'put' : 'post',
                'route'  => $user->exists ?
                 ['admin.users.update', $user->id]:
                 ['admin.users.store']
            ]) !!}
            <div class="form-group">
                {!! Form::label('name', trans('admin_message.users.name')) !!}
                {!! Form::text('name', null,['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email',trans('admin_message.users.email')) !!}
                {!! Form::text('email', null,['class' => 'form-control', $user->exists ? 'readonly' : '']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password',trans('admin_message.users.password')) !!}
                {!! Form::password('password',['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password_confirmation', trans('admin_message.users.password_confirmation')) !!}
                {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
            </div>

            {!! Form::submit($user->exists ? trans('admin_message.users.save') : trans('admin_message.users.create'), ['class' => 'btn btn-primary btn-flat']) !!}
            <a href="{!! url('admin/users') !!}" title="{{ trans('admin_message.cancel') }}" class="btn btn-danger btn-flat">{{ trans('admin_message.cancel') }}</a>
            {!! Form::close() !!}
        </div>
    </div>
@endsection