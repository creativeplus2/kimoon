@extends('FrontEnd.main.master-front-end')

@section('title', __('Register'))

@push('css')
<link href="{{ asset('material/assets/css/select2.css') }}" rel="stylesheet" />
@endpush

@section('content')

@foreach ($text as $block)
@include('FrontEnd.main.'.$block['block'], ['text'=> $block['content']] )
@endforeach

<section class="login-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="login-page__wrap">
                    <form class="register-form-validated" action="{{ route('web.submit_register') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="row mb-2">
                            <div class="col-md-6 mb-2">
                                <h3>Register</h3>

                                <div class="form-group">
                                    <label for="type-user">{{ __('Plan') }}</label>
                                    <input type="text" name="type_user" id="type-user"
                                        class="form-control @error('type_user') is-invalid @enderror"
                                        value="{{ isset($member) ? $member->type_user : old('type_user') }}"
                                        placeholder="{{ __('type user') }}" required readonly />
                                </div>

                                <div class="form-group">
                                    <label for="nama-member">{{ __('Nama') }}</label>
                                    <input minlength="3" type="text" name="nama_member" id="nama-member"
                                        class="form-control @error('nama_member') is-invalid @enderror"
                                        value="{{ isset($member) ? $member->nama_member : old('nama_member') }}"
                                        placeholder="{{ __('Nama Member') }}" required />
                                    @error('nama_member')
                                    <label class="error">
                                        {{ $message }}
                                    </label>
                                    @enderror
                                </div>
                                <div class="form-group">


                                    <label for="email">{{ __('Email') }}</label>
                                    <input type="email" name="email" id="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ isset($member) ? $member->email : old('email') }}"
                                        placeholder="{{ __('Email') }}" required />
                                    @error('email')
                                    <label class="error">
                                        {{ $message }}
                                    </label>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="no-telpon">{{ __('No. Handphone') }}</label>
                                    <input maxlength="15" type="number" name="no_telpon" id="no-telpon"
                                        class="form-control @error('no_telpon') is-invalid @enderror"
                                        value="{{ isset($member) ? $member->no_telpon : old('no_telpon') }}"
                                        placeholder="{{ __('No. Handphone contoh: 081189998334') }}" required />
                                    @error('no_telpon')
                                    <label class="error">
                                        {{ $message }}
                                    </label>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="no-ktp">{{ __('No. Ktp') }}</label>
                                    <input minlength="16" type="number" name="no_ktp" id="no-ktp"
                                        class="form-control @error('no_ktp') is-invalid @enderror"
                                        value="{{ isset($member) ? $member->no_ktp : old('no_ktp') }}"
                                        placeholder="{{ __('No. Ktp') }}" required />
                                    @error('no_ktp')
                                    <label class="error">
                                        {{ $message }}
                                    </label>
                                    @enderror
                                </div>



                                @isset($member)
                                <div class="row">
                                    <div class="col-md-4 text-center">
                                        @if ($member->photo_ktp == null)
                                        <img src="https://via.placeholder.com/350?text=No+Image+Avaiable"
                                            alt="Photo Ktp" class="rounded mb-2 mt-2" alt="Photo Ktp" width="200"
                                            height="150" style="object-fit: cover">
                                        @else
                                        <img src="{{ asset('storage/uploads/photo_ktps/' . $member->photo_ktp) }}"
                                            alt="Photo Ktp" class="rounded mb-2 mt-2" width="200" height="150"
                                            style="object-fit: cover">
                                        @endif
                                    </div>

                                    <div class="col-md-8">
                                        <div class="form-group ms-3">
                                            <label for="photo_ktp">{{ __('Photo Ktp') }}</label>
                                            <input type="file" name="photo_ktp"
                                                class="form-control @error('photo_ktp') is-invalid @enderror"
                                                id="photo_ktp">

                                            @error('photo_ktp')
                                            <label class="error">
                                                {{ $message }}
                                            </label>
                                            @enderror
                                            <div id="photo_ktpHelpBlock" class="form-text">
                                                {{ __('Leave the photo ktp blank if you don`t want to change it.') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <div class="form-group">
                                    <label for="photo_ktp">{{ __('Photo Ktp') }}</label>
                                    <input type="file" name="photo_ktp"
                                        class="form-control @error('photo_ktp') is-invalid @enderror" id="photo_ktp"
                                        required>

                                    @error('photo_ktp')
                                    <label class="error">
                                        {{ $message }}
                                    </label>
                                    @enderror
                                </div>
                                @endisset

                                <div class="form-group">
                                    <label for="password">{{ __('Password') }}</label>
                                    <input minlength="8" type="password" name="password" id="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        placeholder="{{ __('Password') }}" {{ empty($member) ? ' required' : '' }} />
                                    @error('password')
                                    <label class="error">
                                        {{ $message }}
                                    </label>
                                    @enderror
                                    <!-- @isset($member)
                                    <div id="PasswordHelpBlock" class="form-text">
                                        {{ __("Leave the Password & Password Confirmation blank if you do not want to
                                        change them.") }}
                                    </div>
                                    @endisset -->
                                </div>

                                <div class="form-group">
                                    <label for="password-confirmation">{{ __('Password Confirmation') }}</label>
                                    <input minlength="8" type="password" name="password_confirmation"
                                        id="password-confirmation" class="form-control"
                                        placeholder="{{ __('Password Confirmation') }}" {{ empty($member) ? ' required'
                                        : '' }} />
                                </div>
                            </div>
                            <div class="col-md-6 mb-2 alamat">
                                <h3>Alamat</h3>
                                <div class="form-group">
                                    <label for="provinsi-id">{{ __('Propinsi') }}</label>
                                    <select
                                        class="form-control js-example-basic-multiple @error('provinsi_id') is-invalid @enderror"
                                        name="provinsi_id" id="provinsi-id" required>
                                        <option value="" selected disabled>-- {{ __('Select province') }} --
                                        </option>
                                        @foreach ($provinces as $province)
                                        <option value="{{ $province->id }}" {{ isset($member) && $member->provinsi_id ==
                                            $province->id ? 'selected' : (old('provinsi_id') == $province->id ?
                                            'selected' : '') }}>
                                            {{ $province->provinsi }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('provinsi_id')
                                    <label class="error">
                                        {{ $message }}
                                    </label>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="kabkot-id">{{ __('Kabupaten kota') }}</label>
                                    <select
                                        class="form-control js-example-basic-multiple @error('kabkot_id') is-invalid @enderror"
                                        name="kabkot_id" id="kabkot-id" required>
                                        <option value="" selected disabled>-- {{ __('Select kabkot') }} --
                                        </option>
                                    </select>
                                    @error('kabkot_id')
                                    <label class="error">
                                        {{ $message }}
                                    </label>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="kecamatan-id">{{ __('Kecamatan') }}</label>
                                    <select
                                        class="form-control js-example-basic-multiple @error('kecamatan_id') is-invalid @enderror"
                                        name="kecamatan_id" id="kecamatan-id" required>
                                        <option value="" selected disabled>-- {{ __('Select kecamatan') }} --
                                        </option>
                                    </select>
                                    @error('kecamatan_id')
                                    <label class="error">
                                        {{ $message }}
                                    </label>
                                    @enderror
                                </div>

                                <div class="form-group"> <label for="kelurahan-id">{{ __('Kelurahan') }}</label>
                                    <select
                                        class="form-control js-example-basic-multiple @error('kelurahan_id') is-invalid @enderror"
                                        name="kelurahan_id" id="kelurahan-id" required>
                                        <option value="" selected disabled>-- {{ __('Select kelurahan') }} --
                                        </option>
                                    </select>
                                    @error('kelurahan_id')
                                    <label class="error">
                                        {{ $message }}
                                    </label>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="zip-code">{{ __('Zip Code') }}</label>
                                    <input type="text" name="zip_code" id="zip-code"
                                        class="form-control @error('zip_code') is-invalid @enderror"
                                        value="{{ isset($member) ? $member->zip_code : old('zip_code') }}"
                                        placeholder="{{ __('Zip Code') }}" required readonly />
                                    @error('zip_code')
                                    <label class="error">
                                        {{ $message }}
                                    </label>
                                    @enderror
                                </div>
                                <div class="form-group">

                                    <label for="alamat-member">{{ __('Alamat Lengkap') }}</label>
                                    <textarea rows="5" name="alamat_member" id="alamat-member"
                                        class="form-control @error('alamat_member') is-invalid @enderror"
                                        placeholder="{{ __('Alamat Lengkap') }}"
                                        required>{{ isset($member) ? $member->alamat_member : old('alamat_member') }}</textarea>
                                    @error('alamat_member')
                                    <label class="error">
                                        {{ $message }}
                                    </label>
                                    @enderror
                                </div>
                            </div>
                        </div>
                </div>
                <button type="submit" class="solox-btn form-register">
                    <span>
                        {{ __('Submit') }}
                    </span>
                </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function () {
        $('.js-example-basic-multiple').select2();
    });
    $(".member-type-distributor").click(function () {
        $("#type-user").val('Distributor');
        $(".membership-one__card").removeClass('active');
        $(this.parentNode).addClass('active');
        $("#type-user").focus()

    });
    $(".member-type-subdis").click(function () {
        $("#type-user").focus()

        $("#type-user").val('Subdis');
        $(".membership-one__card").removeClass('active');
        $(this.parentNode).addClass('active');
    });
    $(".member-type-reseller").click(function () {
        $("#type-user").focus()

        $("#type-user").val('Reseller');
        $(".membership-one__card").removeClass('active');
        $(this.parentNode).addClass('active');
    });
</script>

<script>

    const options_temp = '<option value="" selected disabled>-- Select --</option>';
    $(function () {
        $('#kabkot-id, #kecamatan-id, #kelurahan-id').html(options_temp);
        if ($('#provinsi-id').val() != "") {
            getKabupatenKota($('#provinsi-id').val());
        }

    });
    $('#provinsi-id').change(function () {
        $('#kabkot-id, #kecamatan-id, #kelurahan-id').html(options_temp);
        if ($(this).val() != "") {

            getKabupatenKota($(this).val());
        }
        $("#provinsi-id").focus()
        // onValidation('provinsi')
    })

    $('#kabkot-id').change(function () {
        $('#kecamatan-id, #kelurahan-id').html(options_temp);
        if ($(this).val() != "") {
            getKecamatan($(this).val());
        }
        $("#kabkot-id").focus()

        // onValidation('kota')
    })

    $('#kecamatan-id').change(function () {
        $('#kelurahan-id').html(options_temp);
        if ($(this).val() != "") {
            getKelurahan($(this).val());
        }
        $("#kecamatan-id").focus()

        //onValidation('kecamatan')
    })

    $('#kelurahan-id').change(function () {
        if ($(this).val() != "") {
            getZipCode($(this).val());
        }
        $("#kelurahan-id").focus()
        $("#zip-code").focus()

        //onValidation('kelurahan')
    });



    function getKabupatenKota(provinsiId) {
        let url = '{{ route('api.kota', ':id') }}';
        url = url.replace(':id', provinsiId)
        $.ajax({
            url,
            method: 'GET',
            beforeSend: function () {
                $('#kabkot-id').prop('disabled', true);
            },
            success: function (res) {
                const options = res.data.map(value => {
                    return `<option value="${value.id}">${value.kabupaten_kota}</option>`
                });
                $('#kabkot-id').html(options_temp + options)
                $('#kabkot-id').prop('disabled', false);
            },
            error: function (err) {
                $('#kabkot-id').prop('disabled', false);
                alert(JSON.stringify(err))
            }

        })
    }

    function getKecamatan(kotaId) {
        let url = '{{ route('api.kecamatan', ':id') }}';
        url = url.replace(':id', kotaId)
        $.ajax({
            url,
            method: 'GET',
            beforeSend: function () {
                $('#kecamatan-id').prop('disabled', true);
            },
            success: function (res) {
                const options = res.data.map(value => {
                    return `<option value="${value.id}">${value.kecamatan}</option>`
                });
                $('#kecamatan-id').html(options_temp + options);
                $('#kecamatan-id').prop('disabled', false);
            },
            error: function (err) {
                alert(JSON.stringify(err))
                $('#kecamatan-id').prop('disabled', false);
            }
        })
    }

    function getKelurahan(kotaId) {
        let url = '{{ route('api.kelurahan', ':id') }}';
        url = url.replace(':id', kotaId)
        $.ajax({
            url,
            method: 'GET',
            beforeSend: function () {
                $('#kelurahan-id').prop('disabled', true);
            },
            success: function (res) {
                const options = res.data.map(value => {
                    return `<option value="${value.id}" data-pos="${value.kd_pos}">${value.kelurahan}</option>`
                });
                $('#kelurahan-id').html(options_temp + options);
                $('#kelurahan-id').prop('disabled', false);
            },
            error: function (err) {
                alert(JSON.stringify(err))
                $('#kelurahan-id').prop('disabled', false);
            }
        })
    }


    function getZipCode(kelurahanId) {
        let url = '{{ route('api.zipcode', ':id') }}';
        url = url.replace(':id', kelurahanId);
        $.ajax({
            url: url,
            method: 'GET',
            beforeSend: function () {
                $('#zip-code').val('');
                $('#zip-code').prop('disabled', true);
            },
            success: function (res) {
                $('#zip-code').val(res.zipcode);
                $('#zip-code').prop('disabled', false);
            },
            error: function (err) {
                alert('Terjadi kesalahan: ' + JSON.stringify(err));
            }
        });
    }
</script>
@endpush