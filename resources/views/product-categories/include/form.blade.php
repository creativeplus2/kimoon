<div class="row mb-2">
    <div class="col-md-6 mb-2">
                <label for="nama-kategori">{{ __('Nama Kategori') }}</label>
            <input type="text" name="nama_kategori" id="nama-kategori" class="form-control @error('nama_kategori') is-invalid @enderror" value="{{ isset($productCategory) ? $productCategory->nama_kategori : old('nama_kategori') }}" placeholder="{{ __('Nama Kategori') }}" required />
            @error('nama_kategori')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
    </div>
</div>