<div class="row mb-2">
    <div class="col-md-12">
        <div class="row">
            <div class="col-6 mb-3">
                <label for="aplication-name">{{ trans('utilities/setting/setting.appname') }}</label>
                <input type="text" name="nama_aplikasi" id="aplication-name"
                    class="form-control @error('nama_aplikasi') is-invalid @enderror"
                    value="{{ isset($settingApp) ? $settingApp->nama_aplikasi : old('nama_aplikasi') }}"
                    placeholder="{{ trans('utilities/setting/setting.appname') }}" required />
                @error('nama_aplikasi')
                <span class="text-danger">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <div class="col-6 mb-3">
                <label for="aplication-name">Nama Perusahaan</label>
                <input type="text" name="nama_perusahaan" id="aplication-name"
                    class="form-control @error('nama_perusahaan') is-invalid @enderror"
                    value="{{ isset($settingApp) ? $settingApp->nama_perusahaan : old('nama_perusahaan') }}"
                    placeholder="Nama Perusahaan" required />
                @error('nama_perusahaan')
                <span class="text-danger">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <div class="col-6 mb-3">
                <label for="aplication-name">Deskripsi Perusahaan</label>
                <textarea name="deskripsi_perusahaan" id="deskripsi_perusahaan"
                    class="form-control @error('deskripsi_perusahaan') is-invalid @enderror"
                    placeholder="{{ __('Deskripsi Perusahaan') }}"
                    required>{{ isset($settingApp) ? $settingApp->deskripsi_perusahaan : old('deskripsi_perusahaan') }}</textarea>
                @error('deskripsi_perusahaan')
                <span class="text-danger">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <div class="col-6 mb-3">
                <label for="aplication-name">Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror"
                    placeholder="{{ __('Alamat') }}"
                    required>{{ isset($settingApp) ? $settingApp->alamat : old('alamat') }}</textarea>

                @error('alamat')
                <span class="text-danger">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <div class="col-6 mb-3">
                <label for="aplication-name">No Telpon</label>
                <input type="text" name="no_telpon" id="aplication-name"
                    class="form-control @error('no_telpon') is-invalid @enderror"
                    value="{{ isset($settingApp) ? $settingApp->no_telpon : old('no_telpon') }}" placeholder="No Telpon"
                    required />
                @error('no_telpon')
                <span class="text-danger">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <div class="col-6 mb-3">
                <label for="aplication-name">Email</label>
                <input type="email" name="email" id="aplication-name"
                    class="form-control @error('email') is-invalid @enderror"
                    value="{{ isset($settingApp) ? $settingApp->email : old('email') }}" placeholder="Email" required />
                @error('email')
                <span class="text-danger">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <div class="col-6 mb-3">
                <label for="aplication-name">Facebook</label>
                <input type="text" name="facebook" id="aplication-name"
                    class="form-control @error('facebook') is-invalid @enderror"
                    value="{{ isset($settingApp) ? $settingApp->facebook : old('facebook') }}" placeholder="Facebook"
                    required />
                @error('facebook')
                <span class="text-danger">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <div class="col-6 mb-3">
                <label for="aplication-name">Instagram</label>
                <input type="text" name="instagram" id="aplication-name"
                    class="form-control @error('instagram') is-invalid @enderror"
                    value="{{ isset($settingApp) ? $settingApp->instagram : old('instagram') }}" placeholder="Instagram"
                    required />
                @error('instagram')
                <span class="text-danger">
                    {{ $message }}
                </span>
                @enderror
            </div>



            <div class="col-6 mb-3">
                <label for="aplication-name">Tiktok</label>
                <input type="text" name="tiktok" id="aplication-name"
                    class="form-control @error('tiktok') is-invalid @enderror"
                    value="{{ isset($settingApp) ? $settingApp->tiktok : old('tiktok') }}" placeholder="Tiktok"
                    required />
                @error('tiktok')
                <span class="text-danger">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <div class="col-6 mb-3">
                <label for="aplication-name">X</label>
                <input type="text" name="x" id="aplication-name" class="form-control @error('x') is-invalid @enderror"
                    value="{{ isset($settingApp) ? $settingApp->x : old('x') }}" placeholder="x" required />
                @error('x')
                <span class="text-danger">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <div class="col-6 mb-3">
                <label for="aplication-name">Xendit Secret Key</label>
                <input type="text" name="xendit_secret_key" id="aplication-name"
                    class="form-control @error('xendit_secret_key') is-invalid @enderror"
                    value="{{ isset($settingApp) ? $settingApp->xendit_secret_key : old('xendit_secret_key') }}"
                    placeholder="Xendit Secret Key" required />
                @error('xendit_secret_key')
                <span class="text-danger">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <div class="col-6 mb-3">
                @if ($settingApp->logo != '' || $settingApp->logo != null)
                <img style="width: 180px;" src="{{ Storage::url('public/img/setting_app/') . $settingApp->logo }}"
                    class="">
                <p style="color: red">* {{ trans('utilities/setting/setting.change_logo') }}</p>
                @endif
                <label class="form-label" for="logo"> {{ trans('utilities/setting/setting.logo') }}</label>
                <input type="file" class="form-control @error('logo') is-invalid @enderror" id="logo" name="logo"
                    onchange="previewImg()" value="{{ $settingApp->logo }}">
                @error('logo')
                <span class="text-danger">
                    {{ $message }}
                </span>
                @enderror


            </div>

            <div class="col-6 mb-3">
                @if ($settingApp->favicon != '' || $settingApp->favicon != null)
                <img style="width:100px;height:90px"
                    src="{{ Storage::url('public/img/setting_app/') . $settingApp->favicon }}" class="">
                <p style="color: red">* {{ trans('utilities/setting/setting.change_favicon') }}</p>
                @endif
                <label class="form-label" for="favicon"> {{ trans('utilities/setting/setting.favicon') }}</label>
                <input type="file" class="form-control @error('favicon') is-invalid @enderror" id="favicon"
                    name="favicon" onchange="previewImg()" value="{{ $settingApp->favicon }}">
                @error('favicon')
                <span class="text-danger">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <div class="col-12 mb-3">
                <label for="aplication-name">member table</label>
                <textarea name="membertable" id="membertable"
                    class="form-control @error('membertable') is-invalid @enderror"
                    placeholder="{{ __('Deskripsi Perusahaan') }}" required
                    rows="20">{{ json_encode($settingApp->membertable, JSON_PRETTY_PRINT) }}</textarea>
                @error('membertable')
                <span class="text-danger">
                    {{ $message }}
                </span>
                @enderror
            </div>



        </div>
    </div>
</div>
</div>
</div>