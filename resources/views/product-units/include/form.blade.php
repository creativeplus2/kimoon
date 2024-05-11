<div class="row mb-2">
    <div class="col-md-6 mb-2">
                <label for="nama-unit">{{ __('Nama Unit') }}</label>
            <input type="text" name="nama_unit" id="nama-unit" class="form-control @error('nama_unit') is-invalid @enderror" value="{{ isset($productUnit) ? $productUnit->nama_unit : old('nama_unit') }}" placeholder="{{ __('Nama Unit') }}" required />
            @error('nama_unit')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
    </div>
</div>