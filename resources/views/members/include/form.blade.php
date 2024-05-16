<div class="row mb-2">
    <div class="col-md-6 mb-2">
        <label for="nama-member">{{ __('Nama Member') }}</label>
        <input type="text" name="nama_member" id="nama-member"
            class="form-control @error('nama_member') is-invalid @enderror"
            value="{{ isset($member) ? $member->nama_member : old('nama_member') }}"
            placeholder="{{ __('Nama Member') }}" required />
        @error('nama_member')
            <span class="text-danger">
                {{ $message }}
            </span>
        @enderror
    </div>
    <div class="col-md-6 mb-2">
        <label for="email">{{ __('Email') }}</label>
        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
            value="{{ isset($member) ? $member->email : old('email') }}" placeholder="{{ __('Email') }}" required />
        @error('email')
            <span class="text-danger">
                {{ $message }}
            </span>
        @enderror
    </div>
    <div class="col-md-6 mb-2">
        <label for="no-telpon">{{ __('No Telpon') }}</label>
        <input type="text" name="no_telpon" id="no-telpon"
            class="form-control @error('no_telpon') is-invalid @enderror"
            value="{{ isset($member) ? $member->no_telpon : old('no_telpon') }}" placeholder="{{ __('No Telpon') }}"
            required />
        @error('no_telpon')
            <span class="text-danger">
                {{ $message }}
            </span>
        @enderror
    </div>
    <div class="col-md-6 mb-2">
        <label for="type-user">{{ __('Type User') }}</label>
        <select class="form-control js-example-basic-multiple @error('type_user') is-invalid @enderror" name="type_user" id="type-user" required>
            <option value="" selected disabled>-- {{ __('Select type user') }} --</option>
            <option value="Reseller"
                {{ isset($member) && $member->type_user == 'Reseller' ? 'selected' : (old('type_user') == 'Reseller' ? 'selected' : '') }}>
                Reseller</option>
            <option value="Subdis"
                {{ isset($member) && $member->type_user == 'Subdis' ? 'selected' : (old('type_user') == 'Subdis' ? 'selected' : '') }}>
                Subdis</option>
            <option value="Distributor"
                {{ isset($member) && $member->type_user == 'Distributor' ? 'selected' : (old('type_user') == 'Distributor' ? 'selected' : '') }}>
                Distributor</option>
        </select>
        @error('type_user')
            <span class="text-danger">
                {{ $message }}
            </span>
        @enderror
    </div>

    <div class="col-md-6 mb-2">
        <label for="provinsi-id">{{ __('Province') }}</label>
        <select class="form-control js-example-basic-multiple @error('provinsi_id') is-invalid @enderror" name="provinsi_id" id="provinsi-id"
            required>
            <option value="" selected disabled>-- {{ __('Select province') }} --</option>

            @foreach ($provinces as $province)
                <option value="{{ $province->id }}"
                    {{ isset($member) && $member->provinsi_id == $province->id ? 'selected' : (old('provinsi_id') == $province->id ? 'selected' : '') }}>
                    {{ $province->provinsi }}
                </option>
            @endforeach
        </select>
        @error('provinsi_id')
            <span class="text-danger">
                {{ $message }}
            </span>
        @enderror
    </div>

    <div class="col-md-6 mb-2">
        <label for="kabkot-id">{{ __('Kabkot') }}</label>
        <select class="form-control js-example-basic-multiple @error('kabkot_id') is-invalid @enderror" name="kabkot_id" id="kabkot-id" required>
            <option value="" selected disabled>-- {{ __('Select kabkot') }} --</option>
        </select>
        @error('kabkot_id')
            <span class="text-danger">
                {{ $message }}
            </span>
        @enderror
    </div>

    <div class="col-md-6 mb-2">
        <label for="kecamatan-id">{{ __('Kecamatan') }}</label>
        <select class="form-control js-example-basic-multiple @error('kecamatan_id') is-invalid @enderror" name="kecamatan_id" id="kecamatan-id"
            required>
            <option value="" selected disabled>-- {{ __('Select kecamatan') }} --</option>
        </select>
        @error('kecamatan_id')
            <span class="text-danger">
                {{ $message }}
            </span>
        @enderror
    </div>

    <div class="col-md-6 mb-2">
        <label for="kelurahan-id">{{ __('Kelurahan') }}</label>
        <select class="form-control js-example-basic-multiple @error('kelurahan_id') is-invalid @enderror" name="kelurahan_id" id="kelurahan-id"
            required>
            <option value="" selected disabled>-- {{ __('Select kelurahan') }} --</option>
        </select>
        @error('kelurahan_id')
            <span class="text-danger">
                {{ $message }}
            </span>
        @enderror
    </div>

    <div class="col-md-6 mb-2">
        <label for="zip-code">{{ __('Zip Code') }}</label>
        <input type="text" name="zip_code" id="zip-code"
            class="form-control @error('zip_code') is-invalid @enderror"
            value="{{ isset($member) ? $member->zip_code : old('zip_code') }}" placeholder="{{ __('Zip Code') }}"
            required readonly/>
        @error('zip_code')
            <span class="text-danger">
                {{ $message }}
            </span>
        @enderror
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="alamat-member">{{ __('Alamat Member') }}</label>
            <textarea name="alamat_member" id="alamat-member" class="form-control @error('alamat_member') is-invalid @enderror"
                placeholder="{{ __('Alamat Member') }}" required>{{ isset($member) ? $member->alamat_member : old('alamat_member') }}</textarea>
            @error('alamat_member')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6 mb-2">
        <label for="no-ktp">{{ __('No Ktp') }}</label>
        <input type="text" name="no_ktp" id="no-ktp"
            class="form-control @error('no_ktp') is-invalid @enderror"
            value="{{ isset($member) ? $member->no_ktp : old('no_ktp') }}" placeholder="{{ __('No Ktp') }}"
            required />
        @error('no_ktp')
            <span class="text-danger">
                {{ $message }}
            </span>
        @enderror
    </div>
    @isset($member)
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-4 text-center">
                    @if ($member->photo_ktp == null)
                        <img src="https://via.placeholder.com/350?text=No+Image+Avaiable" alt="Photo Ktp"
                            class="rounded mb-2 mt-2" alt="Photo Ktp" width="200" height="150"
                            style="object-fit: cover">
                    @else
                        <img src="{{ asset('storage/uploads/photo_ktps/' . $member->photo_ktp) }}" alt="Photo Ktp"
                            class="rounded mb-2 mt-2" width="200" height="150" style="object-fit: cover">
                    @endif
                </div>

                <div class="col-md-8">
                    <div class="form-group ms-3">
                        <label for="photo_ktp">{{ __('Photo Ktp') }}</label>
                        <input type="file" name="photo_ktp"
                            class="form-control @error('photo_ktp') is-invalid @enderror" id="photo_ktp">

                        @error('photo_ktp')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                        <div id="photo_ktpHelpBlock" class="form-text">
                            {{ __('Leave the photo ktp blank if you don`t want to change it.') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="col-md-6">
            <div class="form-group">
                <label for="photo_ktp">{{ __('Photo Ktp') }}</label>
                <input type="file" name="photo_ktp" class="form-control @error('photo_ktp') is-invalid @enderror"
                    id="photo_ktp" required>

                @error('photo_ktp')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div>
    @endisset
    <div class="col-md-6">
        <div class="form-group">
            <label for="password">{{ __('Password') }}</label>
            <input type="password" name="password" id="password"
                class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('Password') }}"
                {{ empty($member) ? ' required' : '' }} />
            @error('password')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
            @isset($member)
                <div id="PasswordHelpBlock" class="form-text">
                    {{ __('Leave the Password & Password Confirmation blank if you don`t want to change them.') }}
                </div>
            @endisset
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="password-confirmation">{{ __('Password Confirmation') }}</label>
            <input type="password" name="password_confirmation" id="password-confirmation" class="form-control"
                placeholder="{{ __('Password Confirmation') }}" {{ empty($member) ? ' required' : '' }} />
        </div>
    </div>
    <div class="col-md-6 mb-2">
        <label for="status-member">{{ __('Status Member') }}</label>
        <select class="form-control js-example-basic-multiple @error('status_member') is-invalid @enderror" name="status_member"
            id="status-member" required>
            <option value="" selected disabled>-- {{ __('Select status member') }} --</option>
            <option value="Pending"
                {{ isset($member) && $member->status_member == 'Pending' ? 'selected' : (old('status_member') == 'Pending' ? 'selected' : '') }}>
                Pending</option>
            <option value="Approved"
                {{ isset($member) && $member->status_member == 'Approved' ? 'selected' : (old('status_member') == 'Approved' ? 'selected' : '') }}>
                Approved</option>
            <option value="Rejected"
                {{ isset($member) && $member->status_member == 'Rejected' ? 'selected' : (old('status_member') == 'Rejected' ? 'selected' : '') }}>
                Rejected</option>
        </select>
        @error('status_member')
            <span class="text-danger">
                {{ $message }}
            </span>
        @enderror
    </div>

</div>
