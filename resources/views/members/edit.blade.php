@extends('layouts.app')

@section('title', __('Edit Members'))

@section('content')


    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">{{ __('Members') }}</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <a href="/panel">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('members.index') }}">{{ __('Members') }}</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    {{ __('Edit') }}
                                </li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('members.update', $member->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                @include('members.include.form-edit')

                                <a href="{{ url()->previous() }}" class="btn btn-secondary"><i
                                        class="mdi mdi-arrow-left-thin"></i> {{ __('Back') }}</a>

                                <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save"></i>
                                    {{ __('Update') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        const options_temp = '<option value="" selected disabled>-- Select --</option>';

        $('#provinsi-id').change(function() {
            $('#kabkot-id, #kecamatan-id, #kelurahan-id').html(options_temp);
            if ($(this).val() != "") {
                getKabupatenKota($(this).val());
            }
            // onValidation('provinsi')
        })

        $('#kabkot-id').change(function() {
            $('#kecamatan-id, #kelurahan-id').html(options_temp);
            if ($(this).val() != "") {
                getKecamatan($(this).val());
            }
            // onValidation('kota')
        })

        $('#kecamatan-id').change(function() {
            $('#kelurahan-id').html(options_temp);
            if ($(this).val() != "") {
                getKelurahan($(this).val());
            }
            //onValidation('kecamatan')
        })

        $('#kelurahan-id').change(function() {
            if ($(this).val() != "") {
                getZipCode($(this).val());
            }
            //onValidation('kelurahan')
        });

        function getKabupatenKota(provinsiId) {
            let url = '{{ route('api.kota', ':id') }}';
            url = url.replace(':id', provinsiId)
            $.ajax({
                url,
                method: 'GET',
                beforeSend: function() {
                    $('#kabkot-id').prop('disabled', true);
                },
                success: function(res) {
                    const options = res.data.map(value => {
                        return `<option value="${value.id}">${value.kabupaten_kota}</option>`
                    });
                    $('#kabkot-id').html(options_temp + options)
                    $('#kabkot-id').prop('disabled', false);
                },
                error: function(err) {
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
                beforeSend: function() {
                    $('#kecamatan-id').prop('disabled', true);
                },
                success: function(res) {
                    const options = res.data.map(value => {
                        return `<option value="${value.id}">${value.kecamatan}</option>`
                    });
                    $('#kecamatan-id').html(options_temp + options);
                    $('#kecamatan-id').prop('disabled', false);
                },
                error: function(err) {
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
                beforeSend: function() {
                    $('#kelurahan-id').prop('disabled', true);
                },
                success: function(res) {
                    const options = res.data.map(value => {
                        return `<option value="${value.id}" data-pos="${value.kd_pos}">${value.kelurahan}</option>`
                    });
                    $('#kelurahan-id').html(options_temp + options);
                    $('#kelurahan-id').prop('disabled', false);
                },
                error: function(err) {
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
                beforeSend: function() {
                    $('#zip-code').val('');
                    $('#zip-code').prop('disabled', true);
                },
                success: function(res) {
                    $('#zip-code').val(res.zipcode);
                    $('#zip-code').prop('disabled', false);
                },
                error: function(err) {
                    alert('Terjadi kesalahan: ' + JSON.stringify(err));
                }
            });
        }
    </script>
@endpush
