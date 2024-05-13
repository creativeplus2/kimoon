@extends('layouts.app')

@section('title', __('Detail of Products'))

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header" style="margin-top: 5px">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>{{ __('Products') }}</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/panel">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('products.index') }}">{{ __('Products') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ __('Detail') }}
                            </li>
                        </ol>
                    </div>
                    <div class="col-sm-6">
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <tr>
                                        <td class="fw-bold">{{ __('Kode Produk') }}</td>
                                        <td>{{ $product->kode_produk }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Nama Produk') }}</td>
                                        <td>{{ $product->nama_produk }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Sku') }}</td>
                                        <td>{{ $product->sku }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Sub Category') }}</td>
                                        <td>{{ $product->nama_sub_kategori }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Product Unit') }}</td>
                                        <td>{{ $product->nama_unit }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Harga Umum') }}</td>
                                        <td>{{ format_rupiah($product->harga_umum) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Harga Reseller') }}</td>
                                        <td>{{ format_rupiah($product->harga_reseller) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Harga Subdis') }}</td>
                                        <td>{{ format_rupiah($product->harga_subdis) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Harga Distributor') }}</td>
                                        <td>{{ format_rupiah($product->harga_distributor) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Deksripsi Produk') }}</td>
                                        <td>{!! $product->deksripsi_produk !!}</td>
                                    </tr>
                                    {{-- <tr>
                                        <td class="fw-bold">{{ __('Created at') }}</td>
                                        <td>{{ $product->created_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Updated at') }}</td>
                                        <td>{{ $product->updated_at->format('d/m/Y H:i') }}</td>
                                    </tr> --}}
                                </table>
                            </div>

                            <a href="{{ url()->previous() }}" class="btn btn-secondary">{{ __('Back') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
