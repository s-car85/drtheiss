<form action="{!! route('admin.lectures.destroy', $lectures->id) !!}" method="POST"
      onsubmit="return confirm('{!! trans('admin_message.lectures.confirm')!!}'+' {!! $lectures->name !!}?')">
    <input type="hidden" name="_method" value="DELETE">
    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
    <input class="btn btn-sm btn-flat btn-danger"
           type="submit"
           value="{{ trans('admin_message.lectures.delete') }}">
</form>