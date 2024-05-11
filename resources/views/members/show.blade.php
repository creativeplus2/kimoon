@extends('layouts.app')

@section('title', __('Detail of Members'))

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header" style="margin-top: 5px">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>{{ __('Members') }}</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('members.index') }}">{{ __('Members') }}</a>
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
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <tr>
                                        <td class="fw-bold">{{ __('Kode Member') }}</td>
                                        <td>{{ $member->kode_member }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Nama Member') }}</td>
                                        <td>{{ $member->nama_member }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Email') }}</td>
                                        <td>{{ $member->email }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('No Telpon') }}</td>
                                        <td>{{ $member->no_telpon }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Type User') }}</td>
                                        <td>{{ $member->type_user }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Province') }}</td>
                                        <td>{{ $member->provinsi }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Kabkot') }}</td>
                                        <td>{{ $member->kabupaten_kota }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Kecamatan') }}</td>
                                        <td>{{ $member->kecamatan }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Kelurahan') }}</td>
                                        <td>{{ $member->kelurahan }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Zip Code') }}</td>
                                        <td>{{ $member->zip_code }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Alamat Member') }}</td>
                                        <td>{{ $member->alamat_member }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('No Ktp') }}</td>
                                        <td>{{ $member->no_ktp }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Photo Ktp') }}</td>
                                        <td>
                                            @if ($member->photo_ktp == null)
                                                <img src="https://via.placeholder.com/350?text=No+Image+Avaiable"
                                                    alt="Photo Ktp" class="rounded" width="200" height="150"
                                                    style="object-fit: cover">
                                            @else
                                                <img src="{{ asset('storage/uploads/photo_ktps/' . $member->photo_ktp) }}"
                                                    alt="Photo Ktp" style="width: 450px" class="img-thumbnail">
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Status Member') }}</td>
                                        <td>{{ $member->status_member }}</td>
                                    </tr>
                                </table>
                            </div>
                            <a href="{{ url()->previous() }}" class="btn btn-secondary">{{ __('Back') }}</a>

                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
        </div>
    </div>
@endsection
