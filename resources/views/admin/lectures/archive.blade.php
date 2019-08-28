@extends('admin.layout')

@section('title')
    {{ trans('admin_message.sidebar.lectureArhive') }}
@endsection

@section('heading')
    {{ trans('admin_message.sidebar.lectureArhive') }}
@endsection

@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
<style>
    table.dataTable tbody td:nth-child(5) {
      word-break: break-word;
      vertical-align: top;
    }
</style>
@endsection

@section('content')
    <a href="{{ url('admin/lectures') }}" class="btn btn-flat btn-info">&laquo; {{ trans('admin_message.lectures.back') }}</a>
    <br>  <br>
    <div class="box box-primary">
        <div class="box-body">

            <table class="table table-striped table-bordered dt-responsive"  cellspacing="0" width="100%"  id="lectures-table" role="grid">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{ trans('admin_message.lectures.name') }}</th>
                    <th>{{ trans('admin_message.lectures.email') }}</th>
                    <th>{{ trans('admin_message.lectures.calling') }}</th>
                    <th>{{ trans('admin_message.lectures.licence') }}</th>
                    <th>{{ trans('admin_message.lectures.foundation') }}</th>
                    <th>{{ trans('admin_message.lectures.phone') }}</th>
                    <th>{{ trans('admin_message.lectures.lecture') }}</th>
                    <th>{{ trans('admin_message.lectures.ip_adress') }}</th>
                    <th>{{ trans('admin_message.lectures.created') }}</th>
                    <th>{{ trans('admin_message.lectures.seen') }}</th>
                    <th>{{ trans('admin_message.lectures.archived') }}</th>
                    <th>{{ trans('admin_message.lectures.delete') }}</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>

@endsection

@section('scripts')

    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>

    <script>
        $(function() {

            var table = $('#lectures-table').DataTable({
                processing: true,
                serverSide: true,
                paging: false,
                lengthChange: false,
                ordering: true,
                info: true,
                responsive: true,
                autoWidth: false,
                dom: 'Bfrtip',
                lengthMenu: [[25, 100, -1], [25, 100, "all"]],
                pageLength: "all",
                buttons: [
                    'copy', 'csv',  'pdf', 'print',
                    {
                        extend: 'excel',
                        text: '<span class="fa fa-file-excel-o"></span> Excel Export',
                        exportOptions: {
                            modifier: {
                                search: 'applied',
                                page : 'all',
                                order: 'applied'
                            }
                        }
                    }
                ],
                ajax: '{!! route('admin.lectures.dataArchived') !!}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'calling', name: 'calling'},
                    {data: 'licence', name: 'licence'},
                    {data: 'foundation', name: 'foundation'},
                    {data: 'phone', name: 'phone'},
                    {data: 'lecture_events.title', name: 'lecture_events.title', orderable: false},
                    {data: 'ip_adress', name: 'ip_adress'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                    {data: 'action2', name: 'action2', orderable: false, searchable: false},
                    {data: 'action1', name: 'action1', orderable: false, searchable: false},
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
                var seen = $(this).attr('name');

                if(seen == 'seen' || seen == 'arhived'){
                    $(this).parents('tr').toggleClass('danger').toggleClass('default');
                }
                $.ajax({
                    url: '/admin/lectures/' + this.value,
                    type: 'PUT',
                    data: seen + "=" + this.checked + "&_token=" + token
                })
                        .done(function() {
                            $('.fa-spin').remove();
                            $('input[type="checkbox"]:hidden').show();
                            table.ajax.reload();
                        })
                        .fail(function() {
                            $('.fa-spin').remove();
                            var chk = $('input[type="checkbox"]:hidden');
                            if(seen == 'seen') {
                                chk.parents('tr').toggleClass('danger').toggleClass('default');
                            }
                            chk.show().prop('checked', chk.is(':checked') ? null:'checked');
                            alert('Nije updejtovano.');
                        });
            });

        });
    </script>
@endsection