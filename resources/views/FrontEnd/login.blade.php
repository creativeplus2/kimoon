@extends('FrontEnd.main.master-front-end')

@section('title', __('Login'))

@section('content')
    <section class="page-header">
        <div class="page-header__bg"></div>
        <div class="container">
            @if ($setting)
                <img src="{{ Storage::url('public/img/setting_app/') . $setting->favicon }}" alt="products left sidebar" class="page-header__shape" style="width: 60px">
            @endif
            <ul class="solox-breadcrumb list-unstyled">
                <li><a href="{{ route('web.home') }}">Home</a></li>
                <li><span>Login</span></li>
            </ul>
            <h2 class="page-header__title">Login</h2>
        </div>
    </section>
    <section class="login-page">
        <div class="container">
            @if (request()->va_payment == 'approved')
                <div class="kimoon-highlight">
                    <strong>Berhasil!</strong> Pembayaran Virtual Account telah dilakukan, harap konfirmasi ke Admin Kimoon untuk aktivasi akun.
                </div>
            @else
                <div class="kimoon-highlight">
                    <p>Silahkan login untuk masuk kedalam aplikasi</p>
                </div>
            @endif
            <div class="row">
      
                <div class="col-lg-6 ">
                    <div class="login-page__wrap">
                        <h3 class="login-page__wrap__title">Login</h3>

                        <form class="login-page__form" method="post" action="{{ route('web.submit_login') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="email" placeholder="Email" name="email" value="{{ old('email') }}" required>
                                @error('password')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" placeholder="Password" name="password" required>
                                @error('password')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="kimoon-btn"><span>Login</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
