<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\SettingApp;
use Illuminate\Http\Request;



class AuthController extends Controller
{
    public function register()
    {
        $setting = SettingApp::find(1);
        return view('FrontEnd.register',[
            'setting' => $setting
        ]);
    }

    public function login()
    {
        $setting = SettingApp::find(1);
        return view('FrontEnd.login',[
            'setting' => $setting
        ]);
    }
}
