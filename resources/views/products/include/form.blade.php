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
        <select class="form-control js-example-basic-multiple @error('sub_kategori_id') is-invalid @enderror" name="sub_kategori_id"
            id="sub-kategori-id" required>
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
        <select class="form-control js-example-basic-multiple @error('produk_unit_id') is-invalid @enderror" name="produk_unit_id"
            id="produk-unit-id" required>
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
