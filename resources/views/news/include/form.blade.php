@push('css')
<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
@endpush
<div class="row mb-2">
    <div class="col-md-6 mb-2">
        <label for="title">{{ __('Title') }}</label>
        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
            value="{{ isset($news) ? $news->title : old('title') }}" placeholder="{{ __('Title') }}" required />
        @error('title')
        <span class="text-danger">
            {{ $message }}
        </span>
        @enderror
        <label for="description">{{ __('Description') }}</label>
        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
            placeholder="{{ __('Description') }}">{{ isset($news) ? $news->description : old('description') }}</textarea>
        @error('description')
        <span class="text-danger">
            {{ $message }}
        </span>
        @enderror
        @isset($news)
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-4 text-center">
                    @if ($news->featured_image == null)
                    <img src="https://via.placeholder.com/350?text=No+Image+Avaiable" alt="Logo news"
                        class="rounded mb-2 mt-2" alt="Logo news">
                    @else
                    <img style="width: 100%" src="{{ asset('storage/uploads/featuredimage/' . $news->featured_image) }}"
                        alt="Logo news" class="rounded mb-2 mt-2">
                    @endif
                </div>

                <div class="col-md-8">
                    <div class="form-group ms-3">
                        <label for="featured_image">{{ __('Featured Image') }}</label>
                        <input type="file" name="featured_image"
                            class="form-control @error('featured_image') is-invalid @enderror" id="featured_image">

                        @error('featured_image')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                        <div id="featured_imageHelpBlock" class="form-text">
                            {{ __('Leave the logo news blank if you don`t want to change it.') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="col-md-6">
            <div class="form-group">
                <label for="featured_image">{{ __('Logo news') }}</label>
                <input type="file" name="featured_image"
                    class="form-control @error('featured_image') is-invalid @enderror" id="featured_image">

                @error('featured_image')
                <span class="text-danger">
                    {{ $message }}
                </span>
                @enderror
            </div>
        </div>
        @endisset

    </div>
</div>
@push('js')
<script>
    ClassicEditor
        .create(document.querySelector('#description'))
        .catch(error => {
            console.error(error);
        });
</script>
@endpush