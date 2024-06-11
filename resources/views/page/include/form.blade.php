<div class="row mb-2">
    <div class="col-md-12 mb-2">
        <label for="title">{{ __('title') }}</label>
        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
            value="{{ isset($page) ? $page->title : old('title') }}" placeholder="{{ __('title') }}" required />
        @error('title')
        <span class="text-danger">
            {{ $message }}
        </span>
        @enderror
        <label for="content">{{ __('content') }}</label>
        <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" rows="50"
            placeholder="{{ __('content') }}"
            required>{{ isset($page) ? json_encode($page->content, JSON_PRETTY_PRINT) : old('content') }}</textarea>
        @error('content')
        <span class="text-danger">
            {{ $message }}
        </span>
        @enderror


    </div>
</div>