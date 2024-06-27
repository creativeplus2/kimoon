<section class="block-login">
    <div class="container">

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