<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Http\Requests\{StoreMemberRequest, UpdateMemberRequest};
use Yajra\DataTables\Facades\DataTables;
use Image;
use RealRashid\SweetAlert\Facades\Alert;

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
            $members = Member::with('province:id,ibukota', 'kabkot:id,ibukota', 'kecamatan:id,id', 'kelurahan:id,id', );

            return Datatables::of($members)
                ->addColumn('alamat_member', function($row){
                    return str($row->alamat_member)->limit(100);
                })
				->addColumn('province', function ($row) {
                    return $row->province ? $row->province->ibukota : '';
                })->addColumn('kabkot', function ($row) {
                    return $row->kabkot ? $row->kabkot->ibukota : '';
                })->addColumn('kecamatan', function ($row) {
                    return $row->kecamatan ? $row->kecamatan->id : '';
                })->addColumn('kelurahan', function ($row) {
                    return $row->kelurahan ? $row->kelurahan->id : '';
                })
                ->addColumn('photo_ktp', function ($row) {
                    if ($row->photo_ktp == null) {
                    return 'https://via.placeholder.com/350?text=No+Image+Avaiable';
                }
                    return asset('storage/uploads/photo-ktps/' . $row->photo_ktp);
                })

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

        Member::create($attr);

        return redirect()
            ->route('members.index')
            ->with('success', __('The member was created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        $member->load('province:id,ibukota', 'kabkot:id,ibukota', 'kecamatan:id,id', 'kelurahan:id,id', );

		return view('members.show', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        $member->load('province:id,ibukota', 'kabkot:id,ibukota', 'kecamatan:id,id', 'kelurahan:id,id', );

		return view('members.edit', compact('member'));
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

        return redirect()
            ->route('members.index')
            ->with('success', __('The member was updated successfully.'));
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

            return redirect()
                ->route('members.index')
                ->with('success', __('The member was deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('members.index')
                ->with('error', __("The member can't be deleted because it's related to another table."));
        }
    }
}
