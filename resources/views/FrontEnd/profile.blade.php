@extends('FrontEnd.main.master-front-end')
@section('content')
    <section class="page-header">
        <div class="page-header__bg"></div>
        <div class="container">
            @if ($setting)
                <img src="{{ Storage::url('public/img/setting_app/') . $setting->favicon }}" alt="products left sidebar"
                    class="page-header__shape" style="width: 60px">
            @endif
            <ul class="solox-breadcrumb list-unstyled">
                <li><a href="{{ route('web.home') }}">Home</a></li>
                <li><span>Profile</span></li>
            </ul>
            <h2 class="page-header__title">Profile</h2>
        </div>
    </section>

    <section class="contact-one pt-100">
        <div class="container">
            <div class="contact-one__inner">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="contact-one__content">
                            <img src="{{ asset('frontend') }}/assets/images/shapes/contact-1-s-1.png" alt=""
                                class="contact-one__content__shape-1">
                            <img src="{{ asset('frontend') }}/assets/images/shapes/contact-1-s-2.png" alt=""
                                class="contact-one__content__shape-2">
                            <div class="sec-title">
                                <img src="{{ asset('frontend') }}/assets/images/shapes/sec-title-s-1.png"
                                    alt="Contact with us" class="sec-title__img">
                                <h6 class="sec-title__tagline">Profile user</h6>
                            </div>


                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="login-page__info">
                                            <p>Anda terdaftar sebagai <b style="font-size: 18px">Distributor</b></p>
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
                                                    <td>{{ $member->no_ktp }}</td>
                                                </tr>
                                                {{-- <tr>
                                                    <td class="fw-bold">{{ __('Photo Ktp') }}</td>
                                                    <td>
                                                        @if ($member->photo_ktp == null)
                                                            <img src="https://via.placeholder.com/350?text=No+Image+Avaiable"
                                                                alt="Photo Ktp" class="rounded" width="200"
                                                                height="150" style="object-fit: cover">
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
                                                    @php
                                                        $data = DB::table('distributor_cover_area')
                                                            ->join(
                                                                'kabkots',
                                                                'distributor_cover_area.kabkot_id',
                                                                '=',
                                                                'kabkots.id',
                                                            )
                                                            ->select(
                                                                'distributor_cover_area.*',
                                                                'kabkots.kabupaten_kota',
                                                            )
                                                            ->where('distributor_cover_area.member_id', $member->id)
                                                            ->get();
                                                    @endphp
                                                    <tr>
                                                        <td class="fw-bold">
                                                            {{ __('Cover area') }}</td>
                                                        <td>
                                                            <ul>
                                                                @foreach ($data as $x)
                                                                    <li>{{ $x->kabupaten_kota }}</li>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
