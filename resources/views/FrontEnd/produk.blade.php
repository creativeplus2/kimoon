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

    </style>
    <section class="page-header">
        <div class="page-header__bg"></div>
        <div class="container">
            @if ($setting)
                <img src="{{ Storage::url('public/img/setting_app/') . $setting->favicon }}" alt="products left sidebar"
                    class="page-header__shape" style="width: 60px">
            @endif
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
                            <h3 class="product__sidebar--title" style="font-family: Calibri, sans-serif;color:#838184">
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
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse{{ $row->id }}"
                                                aria-expanded="false" aria-controls="collapse{{ $row->id }}"
                                                style="font-size: 18px;font-family: Calibri, sans-serif;color:#838184">
                                                <b>{{ $row->nama_kategori }}</b>
                                            </button>
                                        </h2>
                                        <div id="collapse{{ $row->id }}" class="accordion-collapse collapse"
                                            aria-labelledby="heading{{ $row->id }}"
                                            data-bs-parent="#categoryAccordion">
                                            <div class="accordion-body">
                                                <ul class="list-unstyled"
                                                    style="font-family: Calibri, sans-serif;color:#838184">
                                                    @foreach ($subCategories as $data)
                                                        <li><a
                                                                href="{{ route('web.produk') }}?sub_categori={{ $data->id }}">{{ $data->nama_sub_kategori }}</a>
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
                                        $categoryName = DB::table('sub_categories')
                                            ->where('id', $categoryId)
                                            ->value('nama_sub_kategori');
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
                        @foreach ($products as $row)
                            <div class="col-md-6 col-lg-4">
                                <div class="product__item wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='000ms'>
                                    <div class="product__item__img">
                                        <a href="{{ route('web.produk_detail', $row->id) }}">
                                            <img src="{{ asset('frontend') }}/assets/images/products/product-1-1.jpg"
                                                alt="{{ $row->nama_produk }}">
                                        </a>

                                    </div>
                                    <div class="product__item__content">
                                        <div class="product__item__ratings">
                                            <span class="fa fa-star"></span><span class="fa fa-star"></span><span
                                                class="fa fa-star"></span><span class="fa fa-star"></span><span
                                                class="fa fa-star"></span>
                                        </div>
                                        <h4 class="product__item__title" style="font-size: 14px; height:60px">
                                            <a href="{{ route('web.produk_detail', $row->id) }}"
                                                style="font-family: Calibri, sans-serif;color:#838184">{{ $row->nama_produk }}</a>
                                        </h4>
                                        <div class="product__item__price">{{ format_rupiah($row->harga_umum) }}</div>
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
