@extends('admin.layout')

@section('title')
    {{ trans('admin_message.sidebar.clients') }}
@endsection

@section('heading')
    {{ trans('admin_message.sidebar.client.logos') }}
@endsection

@section('style')
<style>

</style>
@endsection

@section('content')

    <div class="box box-primary">
         <div class="box-header">
            <a href="{{ route('admin.clientlogos.create') }}" class="btn btn-primary btn-flat">
                  <i class="fa fa-plus"></i> &nbsp;&nbsp;
                {{ trans('admin_message.clientlogos.create') }}
            </a>
        </div>
        <div class="box-body">
           <table class="table table-striped table-bordered dt-responsive" id="clientlogos-table" cellspacing="0" width="100%" role="grid">
                <thead>
                    <tr>
                        <th>br.#</th>
                        <th>{{ trans('admin_message.clientlogos.logo') }}</th>
                        <th>{{ trans('admin_message.clientlogos.title') }}</th>
                        <th>{{ trans('admin_message.clientlogos.url') }}</th>
                        <th>{{ trans('admin_message.clientlogos.created') }}</th>
                        <th>{{ trans('admin_message.clientlogos.edit') }}</th>
                        <th>{{ trans('admin_message.clientlogos.delete') }}</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(function() {

            var table = $('#clientlogos-table').DataTable({
                processing: true,
                serverSide: true,
                paging: true,
                lengthChange: false,
                ordering: true,
                info: true,
                responsive: true,
                autoWidth: false,
                ajax: '{!! route('admin.clientlogos.data') !!}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'logo', name: 'logo', searchable: false},
                    {data: 'title', name: 'title'},
                    {data: 'url', name: 'url'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'action0', name: 'action', orderable: false, searchable: false},
                    {data: 'action1', name: 'action', orderable: false, searchable: false},
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