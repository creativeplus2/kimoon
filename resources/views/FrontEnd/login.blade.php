@extends('FrontEnd.main.master-front-end')

@section('title', __('Login'))

@section('content')

<section class="membership-one">
    <div class="container">
        @if (request()->va_payment == 'approved')
        <div class="sec-title">

            <h3 class="sec-title__title">{{$text['title']}}</h3><!-- /.sec-title__title -->
        </div><!-- /.sec-title -->
        <div class="kimoon-highlight">
            <strong>Berhasil!</strong> Pembayaran Virtual Account telah dilakukan, harap konfirmasi ke Admin Kimoon
            untuk aktivasi akun.
        </div>
        @else
        <div class="sec-title">

            <h3 class="sec-title__title">{{$text['title']}}</h3><!-- /.sec-title__title -->
        </div><!-- /.sec-title -->
        @endif
        <div class="row">

            <div class="col-lg-12 ">
                <div class="login-page__wrap">

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