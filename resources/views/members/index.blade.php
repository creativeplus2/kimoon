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
                                <li class="breadcrumb-item"><a href="/panel">Dashboard</a></li>
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
                                            <th>{{ __('Nama') }}</th>
                                            <th>{{ __('Email') }}</th>
                                            <th>{{ __('No Telpon') }}</th>
                                            <th>{{ __('Type User') }}</th>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __('Parent') }}</th>
                                            <th>{{ __('Kabkot') }}</th>
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
                    data: 'status_member',
                    name: 'status_member',
                },
                {
                    data: 'nama_parent',
                    name: 'nama_parent',
                },
                {
                    data: 'kabupaten_kota',
                    name: 'kabupaten_kota',
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
