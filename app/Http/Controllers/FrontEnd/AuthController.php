<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\SettingApp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;



class AuthController extends Controller
{
    public function register()
    {
        $setting = SettingApp::find(1);
        return view('FrontEnd.register', [
            'setting' => $setting
        ]);
    }

    public function login()
    {
        $setting = SettingApp::find(1);
        return view('FrontEnd.login', [
            'setting' => $setting
        ]);
    }

    public function submitLogin(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'email' => "required|email",
                'password' => 'required|string',
            ],
        );
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        $email = $request->email;
        $password = $request->password;
        $data = Member::where('email', $email)->first();
        if ($data) {
            if (Hash::check($password, $data->password)) {
                Session::put('id-member', $data->id);
                Session::put('name-member', $data->nama_member);
                Session::put('email-member', $data->email);
                Session::put('kabkot-member', $data->kabkot_id);
                Session::put('login-member', TRUE);
                Alert::success('Success', 'Login Berhasil');
                return redirect()->route('web.home');
            } else {
                Alert::error('Failed', 'Email atau Password anda salah!');
                return redirect()->back()->withInput($request->all())->withErrors($validator);
            }
        } else {
            Alert::error('Failed', 'Email atau Password anda salah!');
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
    }

    public function submitLogout(Request $request)
    {
        $request->session()->forget('id-member');
        $request->session()->forget('name-member');
        $request->session()->forget('email-member');
        $request->session()->forget('login-member');
        Alert::success('Success', 'Anda telah logout');
        return redirect()->route('web.home');
    }

    public function profile()
    {
        $setting = SettingApp::find(1);
        $member = DB::table('members')
            ->select('members.*', 'provinces.provinsi', 'kabkots.kabupaten_kota', 'kecamatans.kecamatan', 'kelurahans.kelurahan')
            ->leftJoin('provinces', 'members.provinsi_id', '=', 'provinces.id')
            ->leftJoin('kabkots', 'members.kabkot_id', '=', 'kabkots.id')
            ->leftJoin('kecamatans', 'members.kecamatan_id', '=', 'kecamatans.id')
            ->leftJoin('kelurahans', 'members.kelurahan_id', '=', 'kelurahans.id')
            ->where('members.id', Session::get('id-member'))
            ->first();
        return view('FrontEnd.profile', [
            'setting' => $setting,
            'member' => $member
        ]);
    }

    public function listMember()
    {
        $setting = SettingApp::find(1);
        $member = DB::table('members')
            ->select('members.*', 'provinces.provinsi', 'kabkots.kabupaten_kota', 'kecamatans.kecamatan', 'kelurahans.kelurahan')
            ->leftJoin('provinces', 'members.provinsi_id', '=', 'provinces.id')
            ->leftJoin('kabkots', 'members.kabkot_id', '=', 'kabkots.id')
            ->leftJoin('kecamatans', 'members.kecamatan_id', '=', 'kecamatans.id')
            ->leftJoin('kelurahans', 'members.kelurahan_id', '=', 'kelurahans.id')
            ->where('members.id', Session::get('id-member'))
            ->first();
        return view('FrontEnd.list_member', [
            'setting' => $setting,
            'member' => $member
        ]);
    }



}
