<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Mail\NotifyRegisterMemberMail;
use App\Models\Member;
use App\Models\Province;
use App\Models\SettingApp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function register()
    {
        $setting = SettingApp::find(1);
        $provinces = Province::get();
        return view('FrontEnd.register', [
            'setting' => $setting,
            'provinces' => $provinces
        ]);
    }

    public function submitRegister(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'nama_member' => 'required|string|max:255',
            'email' => 'required|email|unique:members,email',
            'no_telpon' => 'required|string|max:15',
            'type_user' => 'required|string|max:255',
            'provinsi_id' => 'required|exists:provinces,id',
            'kabkot_id' => 'required|exists:kabkots,id',
            'kecamatan_id' => 'required|exists:kecamatans,id',
            'kelurahan_id' => 'required|exists:kelurahans,id',
            'zip_code' => 'required|string|max:255',
            'alamat_member' => 'required|string',
            'no_ktp' => 'required|string|max:255|unique:members,no_ktp',
            'password' => 'required|string|min:8|confirmed',
            'photo_ktp' => 'nullable|image|max:2048', // Max 2MB
        ]);

        // If validation fails, return back with errors
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Handle photo_ktp upload
        if ($request->hasFile('photo_ktp')) {
            $photoKtpPath = $request->file('photo_ktp')->store('uploads/photo_ktps');
        } else {
            $photoKtpPath = null;
        }
        $member = new Member();
        $member->kode_member = $this->generateKodeMember();
        $member->nama_member = $request->input('nama_member');
        $member->email = $request->input('email');
        $member->no_telpon = $request->input('no_telpon');
        $member->type_user = $request->input('type_user');
        $member->provinsi_id = $request->input('provinsi_id');
        $member->kabkot_id = $request->input('kabkot_id');
        $member->kecamatan_id = $request->input('kecamatan_id');
        $member->kelurahan_id = $request->input('kelurahan_id');
        $member->zip_code = $request->input('zip_code');
        $member->alamat_member = $request->input('alamat_member');
        $member->no_ktp = $request->input('no_ktp');
        $member->password = bcrypt($request->input('password'));
        $member->photo_ktp = $photoKtpPath;
        $member->status_member = "Pending";
        $member->save();

        // send Email
        Mail::to($member->email)->send(new NotifyRegisterMemberMail($member));

        Alert::success('success', 'Register member berhasil, Silahkan cek email untuk detail informasi / hubungi admin Kimoon.id');
        return redirect()->back();
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
        $validator = Validator::make($request->all(), [
            'email' => "required|email",
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        $email = $request->email;
        $password = $request->password;

        $data = Member::where('email', $email)->first();

        if ($data) {
            if ($data->status_member == 'Approved') {
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
                Alert::error('Failed', 'Akun tidak aktif, silahkan hubungi admin kimoon.id');
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

    private function generateKodeMember()
    {
        $lastMember = Member::latest()->first();
        if ($lastMember) {
            $numericPart = (int)substr($lastMember->kode_member, strrpos($lastMember->kode_member, '-') + 1);
            $newNumericPart = $numericPart + 1;
            $newKodeMember = sprintf("KIMOON-%05d", $newNumericPart);
        } else {
            $newKodeMember = "KIMOON-00001";
        }

        return $newKodeMember;
    }
}
