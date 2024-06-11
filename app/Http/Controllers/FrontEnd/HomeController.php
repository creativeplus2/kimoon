<?php

namespace App\Http\Controllers\FrontEnd;

use App\Mail\Partnership;
use App\Models\SettingApp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use App\Models\Page;



class HomeController extends Controller
{
    public function index(Request $request)
    {
        $setting = SettingApp::find(1);
        $page = Page::where('title', '=', 'home')->firstOrFail();

        return view('FrontEnd.index', [
            'setting' => $setting,
            'text' => $page->content
        ]);
    }
    public function page(Request $request)
    {
        $setting = SettingApp::find(1);
        $path = $request->path();
        $page = Page::where('title', '=', $request->path())->firstOrFail();

        return view('FrontEnd.' . $path, [
            'setting' => $setting,
            'text' => $page->content
        ]);
    }
    public function submitpartnership(Request $request)
    {
        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
        ];
        Mail::to("hello@kimoon.id")->send(new Partnership($details));
        Alert::success('success', 'Register member berhasil, Silahkan cek email untuk detail informasi / hubungi admin Kimoon.id');
        return redirect()->back();
    }
}
