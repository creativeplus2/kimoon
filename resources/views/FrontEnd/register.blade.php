@extends('FrontEnd.main.master-front-end')

@section('title', __('Register'))

@section('content')
    <style>
        .input-form-data {
            height: 58px;
            width: 100%;
            border: none;
            background-color: var(--solox-gray, #f9f6f1);
            padding-left: 30px;
            padding-right: 30px;
            outline: none;
            font-size: 14px;
            color: var(--solox-text, #838184);
            display: block;
            font-weight: 500;
        }
    </style>
    <section class="page-header">
        <div class="page-header__bg"></div>
        <div class="container">
            @if ($setting)
                <img src="{{ Storage::url('public/img/setting_app/') . $setting->favicon }}" alt="products left sidebar"
                    class="page-header__shape" style="width: 60px">
            @endif
            <ul class="solox-breadcrumb list-unstyled">
                <li><a href="{{ route('web.home') }}">Home</a></li>
                <li><span>Register member</span></li>
            </ul>
            <h2 class="page-header__title">Register member</h2>
        </div>
    </section>
    <section class="login-page">
        <div class="container">
            <div class="login-page__info">
                <p>Dapatkan penawaran harga terbaik dengan menjadi member, silahkan isi form registrasi ! </p>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="login-page__wrap">
                        <h3 class="login-page__wrap__title">Register</h3>
                        <form class="login-page__form">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="login-page__form-input-box">
                                        <input type="text" class="input-form-data" placeholder="Nama" style="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="login-page__form-input-box">
                                        <input type="email" class="input-form-data" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="login-page__form-input-box">
                                        <input type="text" class="input-form-data" placeholder="No Telpon">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="login-page__form-input-box">
                                        <select class="input-form-data">
                                            <option value="" disabled selected>-- Pilih Type Member --</option>
                                            <option value="Seller">Seller</option>
                                            <option value="Subdis">Subdis</option>
                                            <option value="Distributor">Distributor</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="login-page__form-input-box">
                                        <input type="text" class="input-form-data" placeholder="Zip Kode">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="login-page__form-input-box">
                                        <input type="text" class="input-form-data" placeholder="Alamat">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="login-page__form-input-box">
                                        <input type="text" class="input-form-data" placeholder="No KTP">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="login-page__form-input-box">
                                        <input type="password" class="input-form-data" placeholder="Password">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="login-page__form-btn-box">
                                        <button type="submit" class="solox-btn solox-btn--base">
                                            <span>Register</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
