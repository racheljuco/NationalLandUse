<form method="POST" action="{!! route('admin.permission.destroy', $id) !!}" accept-charset="UTF-8">
    <input name="_method" value="DELETE" type="hidden">
    {{ csrf_field() }}

        <div class="btn-group btn-group-xs pull-right" role="group">
            <a href="{{ route('admin.permission.show', $id ) }}" class="btn btn-info btn-sm" title="{{ trans('permissions.show') }}">
                <span class="fa fa-eye" aria-hidden="true"></span>
            </a>
            <a href="{{ route('admin.permission.edit', $id ) }}" class="btn btn-primary btn-sm" title="{{ trans('permissions.edit') }}">
                <span class="fa fa-edit" aria-hidden="true"></span>
            </a>

            <button type="submit" class="btn btn-danger btn-sm" title="{{ trans('permissions.delete') }}" onclick="return confirm(&quot;{{ trans('permissions.confirm_delete') }}&quot;)">
                <span class="fa fa-trash" aria-hidden="true"></span>
            </button>
        </div>

    </form>
