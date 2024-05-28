<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SettingApp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\{StoreSettingAppRequest, UpdateSettingAppRequest};


class SettingAppController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:setting app view')->only('index');
        $this->middleware('permission:setting app edit')->only('update');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settingApp = SettingApp::findOrFail(1)->first();
        $users = User::orderBy('name', 'ASC')->get();

        return view('setting-apps.edit', compact('settingApp', 'users'));
    }

    public function update(Request $request, $id)
    {

        $setting_app = SettingApp::findOrFail($id);
        if ($request->file('logo') != null || $request->file('logo') != '') {
            Storage::disk('local')->delete('public/img/setting_app/' . $setting_app->logo);
            $logo = $request->file('logo');
            $logo->storeAs('public/img/setting_app', $logo->hashName());
            $setting_app->update([
                'logo' => $logo->hashName(),
            ]);
        }

        if ($request->file('favicon') != null || $request->file('favicon') != '') {
            Storage::disk('local')->delete('public/img/setting_app/' . $setting_app->favicon);
            $favicon = $request->file('favicon');
            $favicon->storeAs('public/img/setting_app', $favicon->hashName());
            $setting_app->update([
                'favicon' => $favicon->hashName(),
            ]);
        }

        $setting_app->update([
            'nama_aplikasi' => $request->nama_aplikasi,
            'nama_perusahaan' => $request->nama_perusahaan,
            'deskripsi_perusahaan' => $request->deskripsi_perusahaan,
            'no_telpon' => $request->no_telpon,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'tiktok' => $request->tiktok,
            'x' => $request->x,
            'xendit_secret_key' => $request->xendit_secret_key,
            'membertable' => json_decode($request->membertable),

        ]);

        Alert::toast('The settingApp was updated successfully.', 'success');
        return redirect()->route('setting-apps.index');
    }
}
