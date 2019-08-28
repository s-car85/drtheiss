@extends('admin.layout')

@section('title')
    {{ trans('admin_message.sidebar.vaucer') }}
@endsection

@section('heading')
    {{ trans('admin_message.sidebar.vaucer') }}
@endsection

@section('style')
<style>

</style>
@endsection

@section('content')

    <div class="box box-primary">
         <div class="box-header">
            <a href="{{ route('admin.vaucers.create') }}" class="btn btn-primary btn-flat">
                  <i class="fa fa-plus"></i> &nbsp;&nbsp;
                {{ trans('admin_message.vaucers.create_vaucer') }}
            </a>
        </div>
        <div class="box-body">
           <table class="table table-striped table-bordered dt-responsive" id="vaucers-table" cellspacing="0" width="100%" role="grid">
                <thead>
                    <tr>
                        <th>br.#</th>
                        <th>{{ trans('admin_message.vaucers.vaucer_title') }}</th>
                        <th>{{ trans('admin_message.vaucers.slug') }}</th>
                        <th>{{ trans('admin_message.vaucers.vaucer_count') }}</th>
                        <th>{{ trans('admin_message.vaucers.created') }}</th>
                        <th>{{ trans('admin_message.vaucers.active') }}</th>
                        <th>{{ trans('admin_message.vaucers.edit') }}</th>
                        <th>{{ trans('admin_message.vaucers.delete') }}</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(function() {

            var table = $('#vaucers-table').DataTable({
                processing: true,
                serverSide: true,
                paging: true,
                lengthChange: false,
                ordering: true,
                info: true,
                responsive: true,
                autoWidth: false,
                ajax: '{!! route('admin.vaucers.data') !!}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'vaucer_title', name: 'vaucer_title'},
                    {data: 'slug', name: 'slug'},
                    {data: 'vaucer_count', name: 'vaucer_count'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                    {data: 'action0', name: 'action', orderable: false, searchable: false},
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


            // Ajax
            $('body').on(  'change', ':checkbox',function() {

                $(this).hide().parent().append('<i class="fa fa-refresh fa-spin"></i>');

                var token = $('input[name="_token"]').val();
                var active = $(this).attr('name');

                if(active == 'active'){
                    $(this).parents('tr').toggleClass('danger').toggleClass('default');
                }
                $.ajax({
                    url: '/admin/updateactivevaucer/' + this.value,
                    type: 'PUT',
                    data: active + "=" + this.checked + "&_token=" + token
                })
                        .done(function() {
                            $('.fa-spin').remove();
                            $('input[type="checkbox"]:hidden').show();
                            table.ajax.reload();
                        })
                        .fail(function() {
                            $('.fa-spin').remove();
                            var chk = $('input[type="checkbox"]:hidden');
                            if(active == 'active') {
                                chk.parents('tr').toggleClass('danger').toggleClass('default');
                            }
                            chk.show().prop('checked', chk.is(':checked') ? null:'checked');
                            alert('Nije updejtovano.');
                        });
            });

        });
    </script>
@endsection