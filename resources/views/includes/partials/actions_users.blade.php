<form method="POST" action="{!! route('admin.user.destroy', $id) !!}" accept-charset="UTF-8">
    <input name="_method" value="DELETE" type="hidden">
    {{ csrf_field() }}

    <div class="btn-group btn-group-xs pull-right" role="group">
        <a href="{{ route('admin.user.show', $id ) }}" class="btn btn-info btn-sm" title="{{ trans('users.show') }}">
            <span class="fa fa-eye" aria-hidden="true"></span>
        </a>
        <a href="{{ route('admin.user.edit', $id ) }}" class="btn btn-primary btn-sm" title="{{ trans('users.edit') }}">
            <span class="fa fa-edit" aria-hidden="true"></span>
        </a>
        <a href="{{ route('admin.user.edit_role', $id ) }}" class="btn btn-success btn-sm" title="{{ trans('users.edit_role') }}">
            <span class="fa fa-edit" aria-hidden="true"></span>
        </a>

        <button type="submit" class="btn btn-danger btn-sm" title="{{ trans('users.delete') }}" onclick="return confirm(&quot;{{ trans('users.confirm_delete') }}&quot;)">
            <span class="fa fa-trash" aria-hidden="true"></span>
        </button>
    </div>
</form>
