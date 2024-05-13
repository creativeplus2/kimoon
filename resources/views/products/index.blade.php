@extends('layouts.app')

@section('title', __('Products'))

@section('content')

    <div class="modal fade" id="largeModal" tabindex="-1" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><span id="modal_nama_produk"></span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <span id="return-gambar"></span>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">{{ __('Products') }}</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="/panel">Dashboard</a></li>
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
                                            {{-- <th>{{ __('Product Unit') }}</th>
                                            <th>{{ __('Harga Umum') }}</th>
                                            <th>{{ __('Harga Reseller') }}</th>
                                            <th>{{ __('Harga Subdis') }}</th>
                                            <th>{{ __('Harga Distributor') }}</th> --}}
                                            {{-- <th>{{ __('Deksripsi Produk') }}</th> --}}
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
                    name: 'sub_category'
                },
                // {
                //     data: 'product_unit',
                //     name: 'product_unit'
                // },
                // {
                //     data: 'harga_umum',
                //     name: 'harga_umum',
                // },
                // {
                //     data: 'harga_reseller',
                //     name: 'harga_reseller',
                // },
                // {
                //     data: 'harga_subdis',
                //     name: 'harga_subdis',
                // },
                // {
                //     data: 'harga_distributor',
                //     name: 'harga_distributor',
                // },
                // {
                //     data: 'deksripsi_produk',
                //     name: 'deksripsi_produk',
                // },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ],
        });
    </script>

    <script type="text/javascript">
        $(document).on('click', '#view_gambar', function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            $('#largeModal #modal_nama_produk').text(nama);
            console.log(id)

            $.ajax({
                url: '/panel/GetGambarProduk/' + id,
                type: 'GET',

                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                data: {

                },
                success: function(html) {
                    $("#return-gambar").html(html);
                }
            });
        })
    </script>
@endpush
