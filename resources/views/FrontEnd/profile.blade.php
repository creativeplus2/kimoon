@extends('FrontEnd.main.master-front-end')
@section('content')


<section class="contact-one pt-100">
    <div class="container">
        <div class="contact-one__inner">
            <div class="row">
                <div class="col-xl-12">
                    <div class="contact-one__content">


                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="kimoon-highlight">
                                        <p>Anda terdaftar sebagai <b style="font-size: 18px">{{ $member->type_user
                                                }}</b></p>
                                    </div>

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
                                                <td>
                                                    @if ($member->photo_ktp == null)
                                                    <img src="https://via.placeholder.com/350?text=No+Image+Avaiable"
                                                        alt="Photo Ktp" class="rounded mb-2 mt-2" alt="Photo Ktp"
                                                        width="200" height="150" style="object-fit: cover">
                                                    @else
                                                    <img src="{{ asset('storage/uploads/photo_ktps/' . $member->photo_ktp) }}"
                                                        alt="Photo Ktp" class="rounded mb-2 mt-2">
                                                    @endif
                                                    <br />
                                                    {{ $member->no_ktp }}
                                                </td>

                                            </tr>
                                            {{-- <tr>
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
                                            </tr> --}}
                                            <tr>
                                                <td class="fw-bold">{{ __('Status Member') }}</td>
                                                <td>{{ $member->status_member }}</td>
                                            </tr>
                                            @if ($member->type_user == 'Distributor')

                                            <tr>
                                                <td class="fw-bold">
                                                    {{ __('Cover area') }}</td>
                                                <td>
                                                    <ul>
                                                        @foreach ($coverareas as $area)
                                                        <li>{{ $area->kabupaten_kota }}</li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                            </tr>
                                            @endif
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if ($member->type_user == 'Distributor')
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="data-table">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>{{ __('Kode Member') }}</th>
                                                    <th>{{ __('Nama Member') }}</th>
                                                    <th>{{ __('Email') }}</th>
                                                    <th>{{ __('No Telpon') }}</th>
                                                    <th>{{ __('Kab/Kota') }}</th>
                                                    <th>{{ __('Type User') }}</th>
                                                    <th>{{ __('Status Member') }}</th>
                                                </tr>
                                            </thead>

                                            @foreach ($memberchilds as $r)
                                            <tr>
                                                <td>{{ $r->kode_member }}</td>
                                                <td>{{ $r->nama_member }}</td>
                                                <td>{{ $r->email }}</td>
                                                <td>{{ $r->no_telpon }}</td>
                                                <td>{{ $r->kabupaten_kota }}</td>
                                                <td>{{ $r->type_user }}</td>
                                                @if ($r->status_member == 'Pending')
                                                <td><span class="badge bg-secondary">Pending</span></td>
                                                @elseif($r->status_member == 'Approved')
                                                <td><span class="badge bg-success">Approved</span></td>
                                                @elseif($r->status_member == 'Rejected')
                                                <td><span class="badge bg-danger">Rejected</span></td>
                                                @endif
                                            </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection