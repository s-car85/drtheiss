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
            <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-flat">
                <i class="fa fa-plus"></i> &nbsp;&nbsp;
                {{ trans('admin_message.users.create_user') }}
            </a>
        </div>
        <div class="box-body">
            <table class="table table-striped table-bordered dt-responsive" id="users-table" cellspacing="0" width="100%"  role="grid">
                <thead>
                <tr>
                    <th>{{ trans('admin_message.users.avatar') }}</th>
                    <th>{{ trans('admin_message.users.name') }}</th>
                    <th>{{ trans('admin_message.users.email') }}</th>
                    <th>{{ trans('admin_message.users.published') }}</th>
                    <th>{{ trans('admin_message.users.created') }}</th>
                    <th>{{ trans('admin_message.users.edit') }}</th>
                    <th>{{ trans('admin_message.users.delete') }}</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(function() {

            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                paging: true,
                lengthChange: false,
                ordering: true,
                info: true,
                autoWidth: false,
                ajax: '{!! route('admin.users.data') !!}',
                columns: [
                    {data: 'avatar', name: 'avatar', searchable: false},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'posts.length', name: 'posts'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                    {data: 'action1', name: 'action1', orderable: false, searchable: false}
                ],
                @if (App::getLocale() == 'sr')
                "language": {
                    "sProcessing":   "Učitavanje u toku...",
                    "sLengthMenu":   "Prikaži _MENU_ rezultata",
                    "sZeroRecords":  "Nije pronađen nijedan rezultat",
                    "sInfo":         "Prikaz _START_ do _END_ od ukupno _TOTAL_ rezultata",
                    "sInfoEmpty":    "Prikaz 0 do 0 od ukupno 0 rezultata",
                    "sInfoFiltered": "(filtrirano od ukupno _MAX_ rezultata)",
                    "sInfoPostFix":  "",
                    "sSearch":       "Pretraga:",
                    "sUrl":          "",
                    "oPaginate": {
                        "sFirst":    "Početna",
                        "sPrevious": "Prethodna",
                        "sNext":     "Sledeća",
                        "sLast":     "Poslednja"
                    }
                }
                @endif
            });

        });
    </script>
@endsection