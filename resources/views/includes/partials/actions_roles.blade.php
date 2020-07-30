<form method="POST" action="{!! route('admin.role.destroy', $id) !!}" accept-charset="UTF-8">
<input name="_method" value="DELETE" type="hidden">
{{ csrf_field() }}

      <div class="btn-group btn-group-xs pull-right" role="group">
        <a href="{{ route('admin.role.show', $id ) }}" class="btn btn-info btn-sm" title="{{ trans('roles.show') }}">
            <span class="fa fa-eye" aria-hidden="true"></span>
        </a>
        <a href="{{ route('admin.role.edit', $id ) }}" class="btn btn-primary btn-sm" title="{{ trans('roles.edit') }}">
            <span class="fa fa-edit" aria-hidden="true"></span>
        </a>

        <button type="submit" class="btn btn-danger btn-sm" title="{{ trans('roles.delete') }}" onclick="return confirm(&quot;{{ trans('roles.confirm_delete') }}&quot;)">
            <span class="fa fa-trash" aria-hidden="true"></span>
        </button>
    </div>
</form>
