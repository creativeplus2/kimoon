@extends('FrontEnd.main.master-front-end')

@section('title', __('Produk'))

@section('content')
    <section class="page-header">
        <div class="page-header__bg"></div>
        <div class="container">
            <img src="{{ asset('frontend') }}/assets/images/shapes/page-header-s-1.png" alt="products left sidebar"
                class="page-header__shape">
            <ul class="solox-breadcrumb list-unstyled">
                <li><a href="{{ route('web.home') }}">Home</a></li>
                <li><span>produk</span></li>
            </ul>
            <h2 class="page-header__title">Daftar produk</h2>
        </div>
    </section>

    <section class="product-one product-one--page">
        <div class="container">
            <div class="row ">
                <div class="col-lg-3">
                    <div class="product__sidebar product__sidebar-right">
                        <div class="product__search">
                            <form action="#">
                                <input type="text" placeholder="Keywrord...">
                            </form>
                        </div>
                        <div class="product__categories">
                            <h3 class="product__sidebar--title">Categories</h3>
                            <ul class="list-unstyled">
                                @foreach ($produkCategory as $row)
                                    <li><a href="{{ $row->id }}"><span
                                                class="fa fa-arrow-right"></span>{{ $row->nama_kategori }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="product__info-top">
                        <div class="product__showing-text-box">
                            <p class="product__showing-text">Showing 1–9 of 12 Results</p>
                        </div>
                        <div class="product__showing-sort">
                            <select class="selectpicker" aria-label="Sort by popular">
                                <option selected>Sort by name A-Z</option>
                                <option selected>Sort by name Z-A</option>
                                <option value="1">Sort by price</option>
                            </select>
                        </div>
                    </div>

                    <div class="row gutter-y-30">
                        {{-- looping --}}
                        @foreach ($products as $row)
                            <div class="col-md-6 col-lg-4">
                                <div class="product__item wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='000ms'>
                                    <div class="product__item__img">
                                        <img src="{{ asset('frontend') }}/assets/images/products/product-1-1.jpg"
                                            alt="{{ $row->nama_produk }}">
                                    </div>
                                    <div class="product__item__content">
                                        <div class="product__item__ratings">
                                            <span class="fa fa-star"></span><span class="fa fa-star"></span><span
                                                class="fa fa-star"></span><span class="fa fa-star"></span><span
                                                class="fa fa-star"></span>
                                        </div>
                                        <h4 class="product__item__title"><a
                                                href="product-details.html">{{ $row->nama_produk }}</a></h4>
                                        <div class="product__item__price">{{ format_rupiah($row->harga_umum) }}</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
