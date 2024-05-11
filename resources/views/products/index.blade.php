@extends('layouts.app')

@section('title', __('Products'))

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">{{ __('Products') }}</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                                <li class="breadcrumb-item active">{{ __('Products') }}</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            @can('product create')
                                <a href="{{ route('products.create') }}" class="btn btn-md btn-primary"> <i
                                        class="mdi mdi-plus"></i> {{ __('Create a new product') }}</a>
                            @endcan
                        </div>

                        <div class="card-body">
                            <div class="table-responsive p-1">
                                <table class="table table-striped" id="data-table">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>{{ __('Kode Produk') }}</th>
                                            <th>{{ __('Nama Produk') }}</th>
                                            <th>{{ __('Sku') }}</th>
                                            <th>{{ __('Sub Category') }}</th>
                                            <th>{{ __('Product Unit') }}</th>
                                            <th>{{ __('Harga Umum') }}</th>
                                            <th>{{ __('Harga Reseller') }}</th>
                                            <th>{{ __('Harga Subdis') }}</th>
                                            <th>{{ __('Harga Distributor') }}</th>
                                            <th>{{ __('Deksripsi Produk') }}</th>
                                            <th>{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('js')
    <script>
        $('#data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('products.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'kode_produk',
                    name: 'kode_produk',
                },
                {
                    data: 'nama_produk',
                    name: 'nama_produk',
                },
                {
                    data: 'sku',
                    name: 'sku',
                },
                {
                    data: 'sub_category',
                    name: 'sub_category.created_at'
                },
                {
                    data: 'product_unit',
                    name: 'product_unit.id'
                },
                {
                    data: 'harga_umum',
                    name: 'harga_umum',
                },
                {
                    data: 'harga_reseller',
                    name: 'harga_reseller',
                },
                {
                    data: 'harga_subdis',
                    name: 'harga_subdis',
                },
                {
                    data: 'harga_distributor',
                    name: 'harga_distributor',
                },
                {
                    data: 'deksripsi_produk',
                    name: 'deksripsi_produk',
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ],
        });
    </script>
@endpush
