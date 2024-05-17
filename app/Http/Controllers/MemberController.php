<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Http\Requests\{StoreMemberRequest, UpdateMemberRequest};
use Yajra\DataTables\Facades\DataTables;
use Image;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:member view')->only('index', 'show');
        $this->middleware('permission:member create')->only('create', 'store');
        $this->middleware('permission:member edit')->only('edit', 'update');
        $this->middleware('permission:member delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $members = DB::table('members')
                ->select('members.*', 'provinces.provinsi', 'kabkots.kabupaten_kota', 'kecamatans.kecamatan', 'kelurahans.kelurahan', 'parent_member.parent_id')
                ->leftJoin('provinces', 'members.provinsi_id', '=', 'provinces.id')
                ->leftJoin('kabkots', 'members.kabkot_id', '=', 'kabkots.id')
                ->leftJoin('kecamatans', 'members.kecamatan_id', '=', 'kecamatans.id')
                ->leftJoin('kelurahans', 'members.kelurahan_id', '=', 'kelurahans.id')
                ->leftJoin('parent_member', 'members.id', '=', 'parent_member.member_id')
                ->orderBy('members.id', 'desc')
                ->get();
            return Datatables::of($members)
                ->addIndexColumn()
                ->addColumn('alamat_member', function ($row) {
                    return str($row->alamat_member)->limit(100);
                })
                ->addColumn('province', function ($row) {
                    return $row->provinsi;
                })->addColumn('kabkot', function ($row) {
                    return $row->kabupaten_kota;
                })->addColumn('kecamatan', function ($row) {
                    return $row->kecamatan;
                })->addColumn('kelurahan', function ($row) {
                    return $row->kelurahan;
                })->addColumn('status_member', function ($row) {
                    if ($row->status_member == 'Pending') {
                        return '<span class="badge bg-secondary">Pending</span>';
                    } else if ($row->status_member == 'Approved') {
                        return '<span class="badge bg-success">Approved</span>';
                    } else if ($row->status_member == 'Rejected') {
                        return '<span class="badge bg-danger">Rejected</span>';
                    }
                })
                ->addColumn('nama_parent', function ($row) {
                    return getParent($row->parent_id);
                })
                ->addColumn('photo_ktp', function ($row) {
                    if ($row->photo_ktp == null) {
                        return 'https://via.placeholder.com/350?text=No+Image+Avaiable';
                    }
                    return asset('storage/uploads/photo-ktps/' . $row->photo_ktp);
                })
                ->rawColumns(['status_member', 'action'])
                ->addColumn('action', 'members.include.action')
                ->toJson();
        }

        return view('members.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMemberRequest $request)
    {
        $attr = $request->validated();
        if ($request->type_user == 'Distributor') {
            $cekMemberDistributor = DB::table('members')
                ->where('type_user', 'Distributor')
                ->where('status_member', 'Approved')
                ->where('kabkot_id', $request->kabkot_id)
                ->first();
            if ($cekMemberDistributor) {
                Alert::toast('Sudah ada distributor untuk wilayah tersebut', 'error');
                return redirect()->route('members.index');
            } else {
                $attr['kode_member'] =  $this->generateKodeMember();
                $attr['password'] = bcrypt($request->password);
                if ($request->file('photo_ktp') && $request->file('photo_ktp')->isValid()) {
                    $path = storage_path('app/public/uploads/photo_ktps/');
                    $filename = $request->file('photo_ktp')->hashName();
                    if (!file_exists($path)) {
                        mkdir($path, 0777, true);
                    }
                    Image::make($request->file('photo_ktp')->getRealPath())->resize(500, 500, function ($constraint) {
                        $constraint->upsize();
                        $constraint->aspectRatio();
                    })->save($path . $filename);
                    $attr['photo_ktp'] = $filename;
                }

                $member = Member::create($attr);
                if ($member) {
                    $newlyInsertedId = $member->id;
                    $dataCover = [
                        'member_id' => $newlyInsertedId,
                        'kabkot_id' => $request->kabkot_id,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ];
                    DB::table('distributor_cover_area')->insert($dataCover);
                }
                Alert::toast('The member was created successfully.', 'success');
                return redirect()->route('members.index');
            }
        } else {
            // insert member
            $attr['kode_member'] =  $this->generateKodeMember();
            $attr['password'] = bcrypt($request->password);
            if ($request->file('photo_ktp') && $request->file('photo_ktp')->isValid()) {
                $path = storage_path('app/public/uploads/photo_ktps/');
                $filename = $request->file('photo_ktp')->hashName();
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }
                Image::make($request->file('photo_ktp')->getRealPath())->resize(500, 500, function ($constraint) {
                    $constraint->upsize();
                    $constraint->aspectRatio();
                })->save($path . $filename);
                $attr['photo_ktp'] = $filename;
            }

            $member = Member::create($attr);
            if ($member) {
                $cekMemberDistributor = DB::table('distributor_cover_area')
                    ->where('kabkot_id', $request->kabkot_id)
                    ->first();
                if ($cekMemberDistributor) {
                    $newlyInsertedId = $member->id;
                    $dataParent = [
                        'parent_id' => $cekMemberDistributor->member_id,
                        'member_id' => $newlyInsertedId,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ];
                    DB::table('parent_member')->insert($dataParent);
                }
            }
            Alert::toast('The member was created successfully.', 'success');
            return redirect()->route('members.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member $member
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = DB::table('members')
            ->select('members.*', 'provinces.provinsi', 'kabkots.kabupaten_kota', 'kecamatans.kecamatan', 'kelurahans.kelurahan')
            ->leftJoin('provinces', 'members.provinsi_id', '=', 'provinces.id')
            ->leftJoin('kabkots', 'members.kabkot_id', '=', 'kabkots.id')
            ->leftJoin('kecamatans', 'members.kecamatan_id', '=', 'kecamatans.id')
            ->leftJoin('kelurahans', 'members.kelurahan_id', '=', 'kelurahans.id')
            ->where('members.id', $id)
            ->first();
        $memberTakBertuan =  DB::table('members')
            ->select('members.*', 'provinces.provinsi', 'kabkots.kabupaten_kota')
            ->leftJoin('provinces', 'members.provinsi_id', '=', 'provinces.id')
            ->leftJoin('kabkots', 'members.kabkot_id', '=', 'kabkots.id')
            ->leftJoin('parent_member', 'members.id', '=', 'parent_member.member_id')
            ->orderBy('members.id', 'desc')
            ->where('parent_member.id', NULL)
            ->where('members.type_user','!=','Distributor')
            ->get();
        return view('members.show', compact('member', 'memberTakBertuan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        $member->load('province:id,ibukota', 'kabkot:id,ibukota', 'kecamatan:id,id', 'kelurahan:id,id',);
        $kabkots = DB::table('kabkots')->where('provinsi_id', $member->provinsi_id)->get();
        $kecamatans = DB::table('kecamatans')->where('kabkot_id', $member->kabkot_id)->get();
        $kelurahans = DB::table('kelurahans')->where('kecamatan_id', $member->kecamatan_id)->get();
        return view('members.edit', compact('member', 'kabkots', 'kecamatans', 'kelurahans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member $member
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMemberRequest $request, Member $member)
    {
        $attr = $request->validated();

        switch (is_null($request->password)) {
            case true:
                unset($attr['password']);
                break;
            default:
                $attr['password'] = bcrypt($request->password);
                break;
        }

        if ($request->file('photo_ktp') && $request->file('photo_ktp')->isValid()) {

            $path = storage_path('app/public/uploads/photo_ktps/');
            $filename = $request->file('photo_ktp')->hashName();

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            Image::make($request->file('photo_ktp')->getRealPath())->resize(500, 500, function ($constraint) {
                $constraint->upsize();
                $constraint->aspectRatio();
            })->save($path . $filename);

            // delete old photo_ktp from storage
            if ($member->photo_ktp != null && file_exists($path . $member->photo_ktp)) {
                unlink($path . $member->photo_ktp);
            }

            $attr['photo_ktp'] = $filename;
        }

        $member->update($attr);

        Alert::toast('The member was updated successfully.', 'success');
        return redirect()->route('members.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        try {
            $path = storage_path('app/public/uploads/photo_ktps/');

            if ($member->photo_ktp != null && file_exists($path . $member->photo_ktp)) {
                unlink($path . $member->photo_ktp);
            }

            $member->delete();
            Alert::toast('The member was deleted successfully..', 'success');
            return redirect()->route('members.index');
        } catch (\Throwable $th) {
            Alert::toast('The member cant be deleted because its related to another table.', 'error');
            return redirect()->route('members.index');
        }
    }


    public function destroyParentMember($id)
    {
        DB::table('parent_member')->where('id', $id)->delete();
        Alert::toast('Member berhasil dihapus.', 'success');
        return back();
    }

    public function coverDistributor(Request $request)
    {
        // cek kab kot hanya satu
        $cekMemberDistributor = DB::table('distributor_cover_area')
            ->where('kabkot_id', $request->kabkot_id)
            ->first();
        if ($cekMemberDistributor) {
            Alert::toast('Sudah ada distributor untuk wilayah tersebut', 'error');
            return back();
        } else {
            DB::table('distributor_cover_area')->insert([
                'member_id' => $request->member_id,
                'kabkot_id' => $request->kabkot_id,
                'created_at' => now(),
                'updated_at' => now()
            ]);
            Alert::toast('Data distributor cover area berhasil disimpan.', 'success');
            return back();
        }
    }

    public function memberParent(Request $request)
    {
        // cek kab kot hanya satu
        $cekMember = DB::table('parent_member')
            ->where('member_id', $request->member_id)
            ->first();
        if ($cekMember) {
            Alert::toast('Data member Reseller/Subdis sudah terdaftar', 'error');
            return back();
        } else {
            DB::table('parent_member')->insert([
                'parent_id' => $request->parent_id,
                'member_id' => $request->member_id,
                'created_at' => now(),
                'updated_at' => now()
            ]);
            Alert::toast('Data distributor cover area berhasil disimpan.', 'success');
            return back();
        }
    }


    public function deleteCoverArea($id)
    {
        $coverArea = DB::table('distributor_cover_area')->where('id', $id)->first();
        if (!$coverArea) {
            Alert::toast('Data tidak di temukan', 'error');
            return back();
        }
        DB::table('distributor_cover_area')->where('id', $id)->delete();
        Alert::toast('Data berhasil di hapus', 'success');
        return back();
    }

    private function generateKodeMember()
    {
        // Get the last member record
        $lastMember = Member::latest()->first();

        if ($lastMember) {
            // Extract the numeric part of kode_member and increment by one
            $numericPart = (int)substr($lastMember->kode_member, strrpos($lastMember->kode_member, '-') + 1);
            $newNumericPart = $numericPart + 1;

            // Format the new kode_member
            $newKodeMember = sprintf("KIMOON-%05d", $newNumericPart);
        } else {
            // If no member exists, start with KIMOON-00001
            $newKodeMember = "KIMOON-00001";
        }

        return $newKodeMember;
    }
}
