@extends('FrontEnd.main.master-front-end')

@section('title', __('Produk detail'))
@section('content')
    <section class="page-header">
        <div class="page-header__bg"></div>
        <div class="container">
            @if ($setting)
                <img src="{{ Storage::url('public/img/setting_app/') . $setting->favicon }}" alt="products left sidebar" class="page-header__shape" style="width: 60px">
            @endif
            <ul class="solox-breadcrumb list-unstyled">
                <li><a href="{{ route('web.home') }}">Home</a></li>
                <li><span>produk</span></li>
            </ul>
            <h2 class="page-header__title">produk detail</h2>
        </div>
    </section>

    <section class="product-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-xl-6 wow fadeInLeft" data-wow-delay="200ms">
                    <div class="product-details__img">
                        <img id="image-preview-thumb" src="{{ count($product->images) >= 1 ? '/storage/produk/' . $product->images[0]->photo : '/images/no-photo.jpg' }}" alt="{{ $product->nama_produk }}">
                        <div class="product-details__img-search">
                            <a id="image-preview-thumb-popup" class="img-popup" href="{{ count($product->images) >= 1 ? '/storage/produk/' . $product->images[0]->photo : '/images/no-photo.jpg' }}"><span class="icon-magnifying-glass"></span></a>
                        </div>
                    </div>
                    <div id="product-thumbs">
                        @foreach ($product->images as $image)
                            <div onclick="setAsPreviewThumb(this)">
                                <img src="/storage/produk/{{ $image->photo }}" alt="{{ $product->nama_produk }}">
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-6 col-xl-6 wow fadeInRight" data-wow-delay="300ms">
                    <div class="product-details__content">
                        <div class="product-details__top">
                            <h3 class="product-details__title">{{ $product->nama_produk }}</h3>
                        </div>
                        <p style="font-size: 28px;color:#c2a74e;margin-top:-10px">
                            <b>{{ format_rupiah($product->harga_umum) }} /
                                {{ $product->nama_unit }}</b>
                        </p>
                        <div class="product-details__review" style="margin-top:-10px">
                            <span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span>
                        </div>
                        <div class="product-details__divider"></div>
                        <ul>
                            <li>Kategori : {{ $product->nama_kategori }}</li>
                            <li>Sub kategori : {{ $product->nama_sub_kategori }}</li>
                        </ul>
                        <div class="product-details__excerpt">
                            <p class="product-details__excerpt-text1" style="text-align: justify">
                                {!! $product->deksripsi_produk !!}
                            </p>
                            <p class="product-details__excerpt-text2">SKU. {{ $product->sku }} <br>
                                <button class="btn btn-success" style="background-color: #c2a74e; border-color: #c2a74e; color: white;">
                                    <i class="fa fa-check" aria-hidden="true"></i> Produk tersedia
                                </button>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-details__description wow fadeInUp" data-wow-delay="300ms">
                <h3 class="product-details__description__title">Harga Spesial</h3>

                <div class="alert alert-success" role="alert" style="background-color: #c2a74e; border-color: #c2a74e; color: white;text-align:justify">
                    <i class="fa fa-info-circle" aria-hidden="true"></i> Dapatkan penawaran harga terbaik dengan menjadi
                    member !
                </div>
                <table class="table">
                    <tbody>
                        <tr>
                            <th scope="row">Harga Reseller</th>
                            <td>{{ format_rupiah($product->harga_reseller) }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Harga Subdistributor</th>
                            <td>{{ format_rupiah($product->harga_subdis) }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Harga Distributor</th>
                            <td>{{ format_rupiah($product->harga_distributor) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

@push('css')
    <style>
        #product-thumbs {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
            gap: 1rem;
            margin-top: 1rem
        }

        @media screen and (max-width: 425px) {
            #product-thumbs {
                gap: .65rem;
                margin-top: .65rem
            }
        }

        #product-thumbs div {
            cursor: pointer;
            border: 1px solid var(--solox-border-color)
        }

        #product-thumbs div:hover {
            border: 2px solid var(--solox-border-color)
        }

        #product-thumbs div img {
            width: 100%;
            aspect-ratio: 1 / 1;
            object-fit: cover;
            object-position: center
        }
    </style>
@endpush

@push('js')
    <script>
        function setAsPreviewThumb(element) {
            const imageSource = element.querySelector('img').getAttribute('src')
            const imagePreviewThumbElement = document.getElementById('image-preview-thumb')
            const imagePrevieThumbPopupElement = document.getElementById('image-preview-thumb-popup')

            imagePreviewThumbElement.setAttribute('src', imageSource)
            imagePrevieThumbPopupElement.setAttribute('href', imageSource)
        }
    </script>
@endpush
