@extends('FrontEnd.main.master-front-end')

@section('title', __('Produk'))



@section('content')
<style>
    /* Style for pagination */
    .pagination {
        padding-left: 0;
        margin: 20px 0;
        border-radius: 4px;
    }

    .page-item {
        display: inline;
    }

    .page-link {
        position: relative;
        display: block;
        color: #6c757d;
        padding: 0.5rem 0.75rem;
        margin-left: -1px;
        line-height: 1.25;
        background-color: #fff;
        border: 1px solid #dee2e6;
    }

    .page-link:hover {
        z-index: 2;
        color: #007bff;
        text-decoration: none;
        background-color: #e9ecef;
        border-color: #dee2e6;
    }

    .page-item.active .page-link {
        z-index: 3;
        color: #fff;
        background-color: #c2a74e;
        border-color: #c2a74e;
    }

    .accordion {
        background-color: transparent;
        border: none;
    }

    .accordion-item {
        background-color: transparent;
        border: none;
    }

    .accordion-button {
        background-color: rgba(255, 255, 255, 0.1);
        /* color: #fff; */
    }

    .accordion-button:hover {
        background-color: rgba(255, 255, 255, 0.2);
    }

    .accordion-button:not(.collapsed) {
        background-color: rgba(255, 255, 255, 0.2);
    }

    .accordion-body {
        background-color: rgba(255, 255, 255, 0.1);
        color: #fff;
    }
</style>

@include('FrontEnd.main.page-header', ['header'=> $text] )


<section class="product-one product-one--page">
    <div class="container">
        <div class="row ">
            <div class="col-lg-3">
                <div class="product__sidebar product__sidebar-right">
                    <div class="product__search">
                        <form action="#">
                            <input type="text" placeholder="Keyword..." onkeyup="doSearchProducts(this)">
                        </form>

                        <div id="search-result-element">

                        </div>
                    </div>
                    <div class="product__categories">
                        <h3 class="product__sidebar--title">
                            Kategori produk
                        </h3>
                        <div class="accordion accordion-flush" id="categoryAccordion">

                            @foreach ($produkCategory as $row)
                            @php
                            $subCategories = DB::table('sub_categories')
                            ->where('categori_id', $row->id)
                            ->get();
                            @endphp
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading{{ $row->id }}">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse{{ $row->id }}" aria-expanded="false"
                                        aria-controls="collapse{{ $row->id }}">
                                        {{ $row->nama_kategori }}
                                    </button>

                                </h2>
                                <div id="collapse{{ $row->id }}" class="accordion-collapse collapse"
                                    aria-labelledby="heading{{ $row->id }}" data-bs-parent="#categoryAccordion">
                                    <div class="accordion-body">
                                        <ul class="list-unstyled">
                                            @foreach ($subCategories as $data)
                                            <li><a href="{{ route('web.produk') }}?sub_categori={{ $data->id }}">{{
                                                    $data->nama_sub_kategori }}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-9">
                <div class="product__info-top">
                    <div class="product__showing-text-box">
                        <p class="product__showing-text">
                            Showing
                            {{ $products->firstItem() }}-{{ $products->lastItem() }} of {{ $products->total() }}
                            Results

                            @if (request()->has('sub_categori'))
                            @php
                            $categoryId = request()->input('sub_categori');
                            $categoryName = DB::table('sub_categories')->where('id',
                            $categoryId)->value('nama_sub_kategori');
                            @endphp
                            @if ($categoryName)
                            - Kategori {{ $categoryName }}
                            @else
                            Unknown Category
                            @endif
                            @else
                            - All Products
                            @endif
                        </p>
                    </div>
                </div>
                <div class="row gutter-y-30">
                    {{-- looping --}}
                    @foreach ($products as $product)
                    <div class="col-md-6 col-lg-4">
                        <div class="product__item wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='000ms'>
                            <div class="product__item__img">
                                <a href="{{ route('web.produk_detail', $product->id) }}">
                                    <img src="{{ count($product->images) >= 1 ? '/storage/produk/' . $product->images[0]->photo : '/images/no-photo.jpg' }}"
                                        alt="{{ $product->nama_produk }}">
                                </a>

                            </div>
                            <div class="product__item__content">
                                <div class="product__item__ratings">
                                    <span class="fa fa-star"></span><span class="fa fa-star"></span><span
                                        class="fa fa-star"></span><span class="fa fa-star"></span><span
                                        class="fa fa-star"></span>
                                </div>
                                <h4 class="product__item__title">
                                    <a href="{{ route('web.produk_detail', $product->id) }}">{{ $product->nama_produk
                                        }}</a>
                                </h4>
                                <div class="product__item__price">
                                    @if (Session::get('login-member'))
                                    @switch(Session::get('type-user'))
                                    @case('Distributor')
                                    {{ format_rupiah($product->harga_distributor) }}
                                    @break
                                    @case('Subdis')
                                    {{ format_rupiah($product->harga_subdis) }}
                                    @break
                                    @case('Reseller')
                                    {{ format_rupiah($product->harga_reseller) }}
                                    @break
                                    @default

                                    @endswitch
                                    @else
                                    {{ format_rupiah($product->harga_umum) }}
                                    @endif
                                    / {{ $product->nama_unit }}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="d-flex justify-content-center mt-4">
                    {{ $products->onEachSide(0)->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('css')
<style>
    #search-result-element {
        position: absolute;
        z-index: 99;
        background: white;
        width: 100%
    }

    #search-result-element a {
        display: flex;
        align-items: center;
        border: 1px solid #E9C459;
        width: 100%;
        padding: .35rem;
        gap: .5rem
    }

    #search-result-element a:hover {
        background: #E9C459;
        color: white;
    }

    #search-result-element a img {
        width: 50px
    }
</style>
@endpush

@push('js')
<script>
    function doSearchProducts(inputElement) {
        const value = inputElement.value
        const searchResultElement = document.getElementById('search-result-element')

        searchResultElement.innerHTML = ''

        if (value) {
            fetch('/api/products?q=' + value)
                .then((res) => res.json())
                .then((response) => {

                    if (response.products.length > 0) {
                        response.products.forEach((productObj) => {
                            const productImage = productObj.images.length >= 1 ? productObj.images[0].photo : null

                            searchResultElement.insertAdjacentHTML('beforeend',
                                `
                                    <a href="/produk/${productObj.id}">
                                        <div>
                                            <img src="${productImage ? '/storage/produk/' + productImage : '/images/no-photo.jpg'}" alt="${productObj.nama_produk}">
                                        </div>
                                        <p style="font-size: 14px; margin-bottom: 0">${productObj.nama_produk}</p>
                                    </a>
                                `)
                        })
                    } else {
                        searchResultElement.innerHTML =
                            `
                                    <a href="#">
                                        <p style="font-size: 14px; margin-bottom: 0">Produk ${value} tidak ditemukan</p>
                                    </a>
                                `
                    }

                })
        }
    }
</script>
@endpush