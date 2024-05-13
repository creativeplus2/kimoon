@push('css')
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
    <style>
        .img-size {
            height: 450px;
            width: 500px;
            background-size: cover;
            overflow: hidden;
        }

        .modal-content {
            width: 500px;
            border: none;
        }

        .modal-body {
            padding: 2;
        }

        .carousel-control-prev-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23009be1' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E");
            width: 30px;
            height: 48px;
        }

        .carousel-control-next-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23009be1' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E");
            width: 30px;
            height: 48px;
        }
    </style>
@endpush

<div class="modal fade" id="largeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <center><img src="" id="photo_pro" width="100%" /></center>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div class="row mb-2">
    <div class="col-md-6 mb-2">
        <label for="kode-produk">{{ __('Kode Produk') }}</label>
        <input type="text" name="kode_produk" id="kode-produk"
            class="form-control @error('kode_produk') is-invalid @enderror"
            value="{{ isset($product) ? $product->kode_produk : old('kode_produk') }}"
            placeholder="{{ __('Kode Produk') }}" required />
        @error('kode_produk')
            <span class="text-danger">
                {{ $message }}
            </span>
        @enderror
    </div>
    <div class="col-md-6 mb-2">
        <label for="nama-produk">{{ __('Nama Produk') }}</label>
        <input type="text" name="nama_produk" id="nama-produk"
            class="form-control @error('nama_produk') is-invalid @enderror"
            value="{{ isset($product) ? $product->nama_produk : old('nama_produk') }}"
            placeholder="{{ __('Nama Produk') }}" required />
        @error('nama_produk')
            <span class="text-danger">
                {{ $message }}
            </span>
        @enderror
    </div>
    <div class="col-md-6 mb-2">
        <label for="sku">{{ __('Sku') }}</label>
        <input type="text" name="sku" id="sku" class="form-control @error('sku') is-invalid @enderror"
            value="{{ isset($product) ? $product->sku : old('sku') }}" placeholder="{{ __('Sku') }}" required />
        @error('sku')
            <span class="text-danger">
                {{ $message }}
            </span>
        @enderror
    </div>
    <div class="col-md-6 mb-2">
        <label for="sub-kategori-id">{{ __('Sub Category') }}</label>
        <select class="form-control js-example-basic-multiple @error('sub_kategori_id') is-invalid @enderror"
            name="sub_kategori_id" id="sub-kategori-id" required>
            <option value="" selected disabled>-- {{ __('Select sub category') }} --</option>
            @foreach ($subCategories as $subCategory)
                <option value="{{ $subCategory->id }}"
                    {{ isset($product) && $product->sub_kategori_id == $subCategory->id ? 'selected' : (old('sub_kategori_id') == $subCategory->id ? 'selected' : '') }}>
                    {{ $subCategory->nama_sub_kategori }}
                </option>
            @endforeach
        </select>
        @error('sub_kategori_id')
            <span class="text-danger">
                {{ $message }}
            </span>
        @enderror
    </div>
    <div class="col-md-6 mb-2">
        <label for="produk-unit-id">{{ __('Product Unit') }}</label>
        <select class="form-control js-example-basic-multiple @error('produk_unit_id') is-invalid @enderror"
            name="produk_unit_id" id="produk-unit-id" required>
            <option value="" selected disabled>-- {{ __('Select product unit') }} --</option>

            @foreach ($productUnits as $productUnit)
                <option value="{{ $productUnit->id }}"
                    {{ isset($product) && $product->produk_unit_id == $productUnit->id ? 'selected' : (old('produk_unit_id') == $productUnit->id ? 'selected' : '') }}>
                    {{ $productUnit->nama_unit }}
                </option>
            @endforeach
        </select>
        @error('produk_unit_id')
            <span class="text-danger">
                {{ $message }}
            </span>
        @enderror
    </div>
    <div class="col-md-6 mb-2">
        <label for="harga-umum">{{ __('Harga Umum') }}</label>
        <input type="number" name="harga_umum" id="harga-umum"
            class="form-control @error('harga_umum') is-invalid @enderror"
            value="{{ isset($product) ? $product->harga_umum : old('harga_umum') }}"
            placeholder="{{ __('Harga Umum') }}" required />
        @error('harga_umum')
            <span class="text-danger">
                {{ $message }}
            </span>
        @enderror
    </div>
    <div class="col-md-6 mb-2">
        <label for="harga-reseller">{{ __('Harga Reseller') }}</label>
        <input type="number" name="harga_reseller" id="harga-reseller"
            class="form-control @error('harga_reseller') is-invalid @enderror"
            value="{{ isset($product) ? $product->harga_reseller : old('harga_reseller') }}"
            placeholder="{{ __('Harga Reseller') }}" required />
        @error('harga_reseller')
            <span class="text-danger">
                {{ $message }}
            </span>
        @enderror
    </div>
    <div class="col-md-6 mb-2">
        <label for="harga-subdi">{{ __('Harga Subdis') }}</label>
        <input type="number" name="harga_subdis" id="harga-subdi"
            class="form-control @error('harga_subdis') is-invalid @enderror"
            value="{{ isset($product) ? $product->harga_subdis : old('harga_subdis') }}"
            placeholder="{{ __('Harga Subdis') }}" required />
        @error('harga_subdis')
            <span class="text-danger">
                {{ $message }}
            </span>
        @enderror
    </div>
    <div class="col-md-6 mb-2">
        <label for="harga-distributor">{{ __('Harga Distributor') }}</label>
        <input type="number" name="harga_distributor" id="harga-distributor"
            class="form-control @error('harga_distributor') is-invalid @enderror"
            value="{{ isset($product) ? $product->harga_distributor : old('harga_distributor') }}"
            placeholder="{{ __('Harga Distributor') }}" required />
        @error('harga_distributor')
            <span class="text-danger">
                {{ $message }}
            </span>
        @enderror
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="deksripsi-produk">{{ __('Deksripsi Produk') }}</label>
            <textarea name="deksripsi_produk" id="deksripsi-produk"
                class="form-control @error('deksripsi_produk') is-invalid @enderror" placeholder="{{ __('Deksripsi Produk') }}"
                required>{{ isset($product) ? $product->deksripsi_produk : old('deksripsi_produk') }}</textarea>
            @error('deksripsi_produk')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group col-md-6">
        <div class="alert alert-primary" role="alert">
            Silahkan masukan photo photo produk
        </div>
        <table class="table table-bordered table-sm" id="dynamic_field">
            <thead>
                <tr>
                    <th>Photo Produk</th>
                    <th>Action</th>
                </tr>
            </thead>
            @foreach ($photo as $row)
                <tr id="detail_file{{ $row->id }}">
                    <td>
                        <center>
                            <button type="button" class="btn btn-primary btn-xs mb-1" data-id="{{ $row->id }}"
                                id="view_gambar" data-photo="{{ $row->photo }}" data-bs-toggle="modal"
                                title="View Gambar" data-bs-target="#largeModal"><i class="fas fa-eye"></i> Lihat
                                Photo Produk
                            </button>
                        </center>
                        <input type="hidden" name="id_asal[]" value="{{ $row->id }}"
                            class="form-control  @error('id_asal') is-invalid @enderror" />
                    </td>
                    </td>
                    <td>
                        <button type="button" id="{{ $row->id }}"
                            class="btn btn-danger btn_remove_data">X</button>
                    </td>
                </tr>
            @endforeach
            <tr>
                <td><input type="file" name="photo[]"
                        class="form-control  @error('photo') is-invalid @enderror" />
                </td>
                <td><button type="button" name="add_photo" id="add_photo" class="btn btn-success"><i
                            class="fa fa-plus" aria-hidden="true"></i></button>
                </td>
            </tr>



        </table>
        @error('photo')
            <p style="color: red;">{{ $message }}</p>
        @enderror
    </div>
</div>
@push('js')
    <script>
        ClassicEditor
            .create(document.querySelector('#deksripsi-produk'))
            .catch(error => {
                console.error(error);
            });
    </script>

    <script type="text/javascript">
        $(document).on('click', '#view_gambar', function() {
            var photo = $(this).data('photo');
            $('#largeModal #photo_pro').attr("src", "../../../storage/produk/" + photo);
            console.log(photo);
        })

        $(document).on('click', '.btn_remove_data', function() {
            var bid = this.id;
            console.log(bid)
            var trid = $(this).closest('tr').attr('id');
            $('#' + trid + '').remove();
        });
    </script>

    <script>
        $(document).ready(function() {
            var i = 1;
            $('#add_photo').click(function() {
                i++;
                $('#dynamic_field').append('<tr id="row' + i +
                    '"><td><input type="file" name="photo[]" class="form-control" required="" /></td><td><button type="button" name="remove" id="' +
                    i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
            });

            $(document).on('click', '.btn_remove', function() {
                var button_id = $(this).attr("id");
                $('#row' + button_id + '').remove();
            });

        });
    </script>
@endpush
