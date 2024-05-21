<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\SettingApp;
use Illuminate\Http\Request;



class HomeController extends Controller
{
    public function index(Request $request)
    {
        $setting = SettingApp::find(1);
        return view('FrontEnd.index', [
            'setting' => $setting
        ]);
    }
    public function page(Request $request)
    {
        $setting = SettingApp::find(1);
        $path = $request->path();
        return view('FrontEnd.' . $path, [
            'setting' => $setting
        ]);
    }
}
