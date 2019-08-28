<form action="{!! route('admin.clientlogos.destroy', $logo->id) !!}" method="POST"
      onsubmit="return confirm('{!! trans('admin_message.clientlogos.confirm')!!}'+' {!! $logo->title !!}?')">
    <input type="hidden" name="_method" value="DELETE">
    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
    <input class="btn btn-sm btn-flat btn-danger"
           type="submit"
           value="{{ trans('admin_message.clientlogos.delete') }}">
</form>
