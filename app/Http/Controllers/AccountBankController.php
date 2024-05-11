<?php

namespace App\Http\Controllers;

use App\Models\AccountBank;
use App\Http\Requests\{StoreAccountBankRequest, UpdateAccountBankRequest};
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class AccountBankController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:account bank view')->only('index', 'show');
        $this->middleware('permission:account bank create')->only('create', 'store');
        $this->middleware('permission:account bank edit')->only('edit', 'update');
        $this->middleware('permission:account bank delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $accountBanks = AccountBank::with('bank:id,nama_bank');

            return DataTables::of($accountBanks)
                ->addIndexColumn()
                ->addColumn('created_at', function ($row) {
                    return $row->created_at->format('d M Y H:i:s');
                })->addColumn('updated_at', function ($row) {
                    return $row->updated_at->format('d M Y H:i:s');
                })

                ->addColumn('bank', function ($row) {
                    return $row->bank ? $row->bank->nama_bank : '';
                })->addColumn('action', 'account-banks.include.action')
                ->toJson();
        }

        return view('account-banks.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('account-banks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAccountBankRequest $request)
    {
        
        AccountBank::create($request->validated());
        Alert::toast('The accountBank was created successfully.', 'success');
        return redirect()->route('account-banks.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AccountBank  $accountBank
     * @return \Illuminate\Http\Response
     */
    public function show(AccountBank $accountBank)
    {
        $accountBank->load('bank:id,nama_bank');

		return view('account-banks.show', compact('accountBank'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AccountBank  $accountBank
     * @return \Illuminate\Http\Response
     */
    public function edit(AccountBank $accountBank)
    {
        $accountBank->load('bank:id,nama_bank');

		return view('account-banks.edit', compact('accountBank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AccountBank  $accountBank
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAccountBankRequest $request, AccountBank $accountBank)
    {
        
        $accountBank->update($request->validated());
        Alert::toast('The accountBank was updated successfully.', 'success');
        return redirect()
            ->route('account-banks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AccountBank  $accountBank
     * @return \Illuminate\Http\Response
     */
    public function destroy(AccountBank $accountBank)
    {
        try {
            $accountBank->delete();
            Alert::toast('The accountBank was deleted successfully.', 'success');
            return redirect()->route('account-banks.index');
        } catch (\Throwable $th) {
            Alert::toast('The accountBank cant be deleted because its related to another table.', 'error');
            return redirect()->route('account-banks.index');
        }
    }
}
