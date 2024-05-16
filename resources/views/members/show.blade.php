@extends('layouts.app')

@section('title', __('Detail of Members'))

@section('content')

    <!-- Modal Area cover-->
    <div class="modal fade" id="modalCover" aria-labelledby="modalCoverLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCoverLabel">Tambah area cover</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('coverDistributor') }}" method="POST">
                        @csrf
                        <input type="hidden" readonly name="member_id" value="{{ $member->id }}">
                        <div class="col-md-12 mb-2">
                            <label for="provinsi-id">{{ __('Province') }}</label>
                            <select class="form-control " name="provinsi_id" id="provinsi-id" required>
                                <option value="" selected disabled>-- {{ __('Select province') }} --
                                </option>
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->id }}">
                                        {{ $province->provinsi }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-12 mb-2">
                            <label for="kabkot-id">{{ __('Kabkot') }}</label>
                            <select class="form-control select2-option" name="kabkot_id" id="kabkot-id" required>
                                <option value="" selected disabled>-- {{ __('Select kabkot') }} --
                                </option>
                            </select>
                            @error('kabkot_id')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-2">
                            @if ($member->status_member == 'Approved')
                                <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            @else
                                <div class="alert alert-danger" role="alert">
                                    Untuk menambahkan Kabupaten/Kota status member distributer harus approved
                                </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Member-->
    <div class="modal fade" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah member Reseller / Subdis</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('memberParent') }}" method="POST">
                        @csrf
                        <input type="hidden" readonly name="parent_id" value="{{ $member->id }}">
                        <div class="col-md-12 mb-2">
                            <label for="member-id">{{ __('Member') }}</label>
                            <select class="form-control " name="member_id" id="member-id" required>
                                <option value="" selected disabled>-- {{ __('Select member') }} --
                                </option>
                                @foreach ($memberTakBertuan as $data)
                                    <option value="{{ $data->id }}">
                                        {{ $data->nama_member }} || {{ $data->kabupaten_kota }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 mb-2">
                            @if ($member->status_member == 'Approved')
                                <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            @else
                                <div class="alert alert-danger" role="alert">
                                    Untuk menambahkan member Reseller / Subdis status member distributer harus approved
                                </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header" style="margin-top: 5px">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>{{ __('Members') }}</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/panel">Dashboard</a>
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
                <div class="col-md-5">
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
                                        <td class="fw-bold">{{ __('Status Member') }}</td>
                                        <td>{{ $member->status_member }}</td>
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
                                                    alt="Photo Ktp" style="width: 200px" class="img-thumbnail">
                                            @endif
                                        </td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                @if ($member->type_user == 'Distributor')
                    <div class="col-md-7">
                        <div class="card">
                            <div class="card-header">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modalCover">
                                    Tambah area cover
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="alert alert-primary" role="alert">
                                    Daftar kabupaten/kota yang sudah tercover distributor terkait
                                </div>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Kabupaten/Kota</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    @php
                                        $data = DB::table('distributor_cover_area')
                                            ->join('kabkots', 'distributor_cover_area.kabkot_id', '=', 'kabkots.id')
                                            ->select('distributor_cover_area.*', 'kabkots.kabupaten_kota')
                                            ->where('distributor_cover_area.member_id', $member->id)
                                            ->get();
                                    @endphp
                                    <tbody>
                                        @foreach ($data as $row)
                                            <tr>
                                                <td>{{ $row->kabupaten_kota }}</td>
                                                <td>
                                                    <form action="{{ route('deleteCoverArea', $row->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"><i
                                                                class="mdi mdi-trash-can-outline"></i></button>
                                                    </form>
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Tambah member
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive p-1">
                                    <table class="table table-striped" id="data-table">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>{{ __('Kode Member') }}</th>
                                                <th>{{ __('Nama Member') }}</th>
                                                <th>{{ __('Email') }}</th>
                                                <th>{{ __('No Telpon') }}</th>
                                                <th>{{ __('Kab/Kota') }}</th>
                                                <th>{{ __('Type User') }}</th>
                                                <th>{{ __('Status') }}</th>
                                                <th>{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        @php
                                            $datax = DB::table('parent_member')
                                                ->join('members', 'members.id', '=', 'parent_member.member_id')
                                                ->leftJoin('provinces', 'members.provinsi_id', '=', 'provinces.id')
                                                ->leftJoin('kabkots', 'members.kabkot_id', '=', 'kabkots.id')
                                                ->select(
                                                    'parent_member.id as parent_member_id',
                                                    'members.kode_member',
                                                    'members.nama_member',
                                                    'members.email',
                                                    'members.no_telpon',
                                                    'members.status_member',
                                                    'members.type_user',
                                                    'kabkots.kabupaten_kota',
                                                )
                                                ->where('parent_member.parent_id', $member->id)
                                                ->where('members.type_user', '!=', 'Distributor')
                                                ->get();
                                        @endphp
                                        @foreach ($datax as $r)
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

                                                <td>
                                                    <form action="{{ route('delete.member', $r->parent_member_id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus member distributor?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"><i
                                                                class="mdi mdi-trash-can-outline"></i></button>
                                                    </form>
                                                </td>
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
    @endsection

    @push('js')
        <script>
            const options_temp = '<option value="" selected disabled>-- Select --</option>';

            $('#provinsi-id').change(function() {
                $('#kabkot-id').html(options_temp);
                if ($(this).val() != "") {
                    getKabupatenKota($(this).val());
                }
            })

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
        </script>
        <script>
            $(document).ready(function() {
                $("#provinsi-id").select2({
                    dropdownParent: $("#modalCover")
                });
                $("#kabkot-id").select2({
                    dropdownParent: $("#modalCover")
                });
                $("#member-id").select2({
                    dropdownParent: $("#exampleModal")
                });
            });
        </script>
    @endpush
