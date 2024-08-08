<!-- @push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jsoneditor/10.1.0/jsoneditor.min.js"></script>
@endpush
@push('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/jsoneditor/10.1.0/jsoneditor.css" rel="stylesheet" type="text/css">
@endpush -->

@push('js')
<script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
<script src="/vendor/editorjs/block-one.js"></script>
<script src="/vendor/editorjs/block-slideshow.js"></script>
<script src="/vendor/editorjs/block-membership.js"></script>
<script src="/vendor/editorjs/block-column.js"></script>

@endpush
@push('css')
<link href="/vendor/editorjs/editorjs.css" rel="stylesheet" type="text/css">
@endpush

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


    </div>
    <div class="col-md-6 mb-2">
        <!-- <div id="jsoneditor" style="width: 100%; height: 800px;"></div> -->
        <div id="editorjs" class="border "></div>

    </div>
    <div class="col-md-6 mb-2">
        <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" rows="40"
            placeholder="{{ __('content') }}" required></textarea>
        @error('content')
        <span class="text-danger">
            {{ $message }}
        </span>
        @enderror
    </div>
</div>
<!-- @push('js')
<script>
    // create the editor
    const options = {
        modes: ['tree', 'form'],
        mode: 'tree',
        ace: ace
    }
    var container = document.getElementById("jsoneditor");
    var jsoncontent = JSON.parse('{!! isset($page->content) ? json_encode($page->content) : "" !!}')

    var editor = new JSONEditor(container, options);

    // set json
    editor.set(jsoncontent);
    setInterval(getJSON, 1000);
    // get json
    function getJSON() {
        var json = editor.get();
        document.getElementById("content").innerHTML = JSON.stringify(json, null, '\t');
    }
</script>
@endpush -->
@push('js')
<script>
    const ImageTool = window.ImageTool;

    const editor2 = new EditorJS({
        holder: 'editorjs',
        autofocus: true,
        tools: {
            blockone: BlockOne,
            blockslideshow: BlockSlideshow,
            blockmembers: BlockMembers,
            blockcolumn: BlockColumn
        },
        data: JSON.parse('{!! isset($page->content) ? json_encode($page->content) : "" !!}')
    });
    setInterval(getJSON, 1000);
    // get json
    function getJSON() {
        editor2.save().then(savedData => {
            document.getElementById("content").innerHTML = JSON.stringify(savedData, null, 4);
        })
    }
</script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
<script>var route_prefix = "/filemanager";</script>



<script src="http://127.0.0.1:8000/vendor/laravel-filemanager/js/stand-alone-button.js"></script> -->



<script>

    function clickHandler(event) {
        var route_prefix = (options && options.prefix) ? options.prefix : '/filemanager';
        var target_input = event.target.nextElementSibling;

        window.open(route_prefix + '?type=' + options.type || 'image', 'FileManager', 'width=900,height=600');
        window.SetUrl = function (items) {
            var file_path = items.map(function (item) {
                return item.url;
            }).join(',');

            // set the value of the desired input to image url
            target_input.value = file_path;
            target_input.dispatchEvent(new Event('change'));

        };
    };


    // Function to add click listeners to all .imagepop buttons
    function addClickListeners() {
        let buttons = document.querySelectorAll('.imagepop');
        buttons.forEach((button) => {
            if (!button.dataset.listenerAdded) {
                button.addEventListener('click', clickHandler);
                button.dataset.listenerAdded = 'true'; // Mark button as having a listener
            }
        });
    }

    // Create a MutationObserver to watch for added nodes
    const observer = new MutationObserver((mutationsList) => {
        for (let mutation of mutationsList) {
            if (mutation.type === 'childList') {
                // Add click listeners to new .imagepop buttons
                addClickListeners();
            }
        }
    });

    // Start observing the document for added nodes
    observer.observe(document.body, { childList: true, subtree: true });

    // Initial call to add listeners to already existing .imagepop buttons
    addClickListeners();


</script>
@endpush