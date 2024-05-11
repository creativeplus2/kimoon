@extends('layouts.app')

@section('title', __('Members'))

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">{{ __('Members') }}</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                                <li class="breadcrumb-item active">{{ __('Members') }}</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            @can('member create')
                                <a href="{{ route('members.create') }}" class="btn btn-md btn-primary"> <i
                                        class="mdi mdi-plus"></i> {{ __('Create a new member') }}</a>
                            @endcan
                        </div>

                        <div class="card-body">
                            <div class="table-responsive p-1">
                                <table class="table table-striped" id="data-table">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>{{ __('Kode Member') }}</th>
                                            <th>{{ __('Nama Member') }}</th>
                                            <th>{{ __('Email') }}</th>
                                            <th>{{ __('No Telpon') }}</th>
                                            <th>{{ __('Type User') }}</th>
                                            <th>{{ __('Province') }}</th>
                                            <th>{{ __('Kabkot') }}</th>
                                            <th>{{ __('Kecamatan') }}</th>
                                            <th>{{ __('Kelurahan') }}</th>
                                            <th>{{ __('Zip Code') }}</th>
                                            <th>{{ __('Alamat Member') }}</th>
                                            <th>{{ __('No Ktp') }}</th>
                                            <th>{{ __('Photo Ktp') }}</th>
                                            <th>{{ __('Status Member') }}</th>
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
            ajax: "{{ route('members.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'kode_member',
                    name: 'kode_member',
                },
                {
                    data: 'nama_member',
                    name: 'nama_member',
                },
                {
                    data: 'email',
                    name: 'email',
                },
                {
                    data: 'no_telpon',
                    name: 'no_telpon',
                },
                {
                    data: 'type_user',
                    name: 'type_user',
                },
                {
                    data: 'province',
                    name: 'province.ibukota'
                },
                {
                    data: 'kabkot',
                    name: 'kabkot.ibukota'
                },
                {
                    data: 'kecamatan',
                    name: 'kecamatan.id'
                },
                {
                    data: 'kelurahan',
                    name: 'kelurahan.id'
                },
                {
                    data: 'zip_code',
                    name: 'zip_code',
                },
                {
                    data: 'alamat_member',
                    name: 'alamat_member',
                },
                {
                    data: 'no_ktp',
                    name: 'no_ktp',
                },
                {
                    data: 'photo_ktp',
                    name: 'photo_ktp',
                    orderable: false,
                    searchable: false,
                    render: function(data, type, full, meta) {
                        return `<div class="avatar">
                            <img src="${data}" alt="Photo Ktp">
                        </div>`;
                    }
                },
                {
                    data: 'status_member',
                    name: 'status_member',
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
