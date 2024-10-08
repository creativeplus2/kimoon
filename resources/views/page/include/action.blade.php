<td>
    @can('product category edit')
    <a href="{{ route('page.edit', $model->id) }}" class="btn btn-success btn-sm">
        <i class="mdi mdi-pencil"></i>
    </a>
    @endcan

    @can('product category delete')
    <form action="{{ route('page.destroy', $model->id) }}" method="post" class="d-inline"
        onsubmit="return confirm('Are you sure to delete this record?')">
        @csrf
        @method('delete')

        <button class="btn btn-danger btn-sm">
            <i class="mdi mdi-trash-can-outline"></i>
        </button>
    </form>
    @endcan
</td>