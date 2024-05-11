<td>
    <a href="#" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-id="{{ $model->id }}" id="view_gambar"
        data-nama="{{ $model->nama_produk }}" data-bs-target="#largeModal" title="View Gambar"><i
            class="fas fa-image"></i></a>
    <a href="{{ route('products.show', $model->id) }}" class="btn btn-primary btn-sm">
        <i class="mdi mdi-eye"></i>
    </a>
    @can('product edit')
        <a href="{{ route('products.edit', $model->id) }}" class="btn btn-success btn-sm">
            <i class="mdi mdi-pencil"></i>
        </a>
    @endcan

    @can('product delete')
        <form action="{{ route('products.destroy', $model->id) }}" method="post" class="d-inline"
            onsubmit="return confirm('Are you sure to delete this record?')">
            @csrf
            @method('delete')

            <button class="btn btn-danger btn-sm">
                <i class="mdi mdi-trash-can-outline"></i>
            </button>
        </form>
    @endcan
</td>
