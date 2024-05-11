<div class="row mb-2">
<div class="col-md-6 mb-2">
                               <label for="categori-id">{{ __('Product Category') }}</label>
                                    <select class="form-control @error('categori_id') is-invalid @enderror" name="categori_id" id="categori-id"  required>
                                        <option value="" selected disabled>-- {{ __('Select product category') }} --</option>
                                        
                        @foreach ($productCategories as $productCategory)
                            <option value="{{ $productCategory->id }}" {{ isset($subCategory) && $subCategory->categori_id == $productCategory->id ? 'selected' : (old('categori_id') == $productCategory->id ? 'selected' : '') }}>
                                {{ $productCategory->nama_kategori }}
                            </option>
                        @endforeach
                                    </select>
                                    @error('categori_id')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
</div>

    <div class="col-md-6 mb-2">
                <label for="nama-sub-kategori">{{ __('Nama Sub Kategori') }}</label>
            <input type="text" name="nama_sub_kategori" id="nama-sub-kategori" class="form-control @error('nama_sub_kategori') is-invalid @enderror" value="{{ isset($subCategory) ? $subCategory->nama_sub_kategori : old('nama_sub_kategori') }}" placeholder="{{ __('Nama Sub Kategori') }}" required />
            @error('nama_sub_kategori')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
    </div>
</div>