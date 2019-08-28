@extends('admin.layout')

@section('title')
    {{ trans('admin_message.sidebar.lectureevents') }}
@endsection

@section('heading')
    {{ trans('admin_message.sidebar.lectureevents') }}
@endsection

@section('style')
<style>

</style>
@endsection

@section('content')

    <div class="box box-primary">
         <div class="box-header">
            <a href="{{ route('admin.lectureevents.create') }}" class="btn btn-primary btn-flat">
                  <i class="fa fa-plus"></i> &nbsp;&nbsp;
                {{ trans('admin_message.lectureevents.create') }}
            </a>
        </div>
        <div class="box-body">
           <table class="table table-striped table-bordered dt-responsive" id="lectureevents-table" cellspacing="0" width="100%" role="grid">
                <thead>
                    <tr>
                        <th>br.#</th>
                        <th>{{ trans('admin_message.lectureevents.title') }}</th>
                        <th>{{ trans('admin_message.lectureevents.theme') }}</th>
                        <th>{{ trans('admin_message.lectureevents.lecturers') }}</th>
                        <th>{{ trans('admin_message.lectureevents.created') }}</th>
                        <th>{{ trans('admin_message.lectureevents.active') }}</th>
                        <th>{{ trans('admin_message.lectureevents.edit') }}</th>
                        {{--<th>{{ trans('admin_message.lectureevents.delete') }}</th>--}}
                    </tr>
                </thead>
            </table>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(function() {

            var table = $('#lectureevents-table').DataTable({
                processing: true,
                serverSide: true,
                paging: true,
                lengthChange: false,
                ordering: true,
                info: true,
                responsive: true,
                autoWidth: false,
                ajax: '{!! route('admin.lectureevents.data') !!}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'title', name: 'title'},
                    {data: 'theme', name: 'theme'},
                    {data: 'lecturers', name: 'lecturers'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                    {data: 'action0', name: 'action', orderable: false, searchable: false},
                    // {data: 'action1', name: 'action1', orderable: false, searchable: false}
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
                    url: '/admin/updatelectureevents/' + this.value,
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