<?php

namespace App\Http\Controllers;

use App\Models\ProductUnit;
use App\Http\Requests\{StoreProductUnitRequest, UpdateProductUnitRequest};
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class ProductUnitController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:product unit view')->only('index', 'show');
        $this->middleware('permission:product unit create')->only('create', 'store');
        $this->middleware('permission:product unit edit')->only('edit', 'update');
        $this->middleware('permission:product unit delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $productUnits = ProductUnit::query();

            return DataTables::of($productUnits)
                ->addIndexColumn()
                ->addColumn('created_at', function ($row) {
                    return $row->created_at->format('d M Y H:i:s');
                })->addColumn('updated_at', function ($row) {
                    return $row->updated_at->format('d M Y H:i:s');
                })

                ->addColumn('action', 'product-units.include.action')
                ->toJson();
        }

        return view('product-units.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product-units.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductUnitRequest $request)
    {
        
        ProductUnit::create($request->validated());
        Alert::toast('The productUnit was created successfully.', 'success');
        return redirect()->route('product-units.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductUnit  $productUnit
     * @return \Illuminate\Http\Response
     */
    public function show(ProductUnit $productUnit)
    {
        return view('product-units.show', compact('productUnit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductUnit  $productUnit
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductUnit $productUnit)
    {
        return view('product-units.edit', compact('productUnit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductUnit  $productUnit
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductUnitRequest $request, ProductUnit $productUnit)
    {
        
        $productUnit->update($request->validated());
        Alert::toast('The productUnit was updated successfully.', 'success');
        return redirect()
            ->route('product-units.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductUnit  $productUnit
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductUnit $productUnit)
    {
        try {
            $productUnit->delete();
            Alert::toast('The productUnit was deleted successfully.', 'success');
            return redirect()->route('product-units.index');
        } catch (\Throwable $th) {
            Alert::toast('The productUnit cant be deleted because its related to another table.', 'error');
            return redirect()->route('product-units.index');
        }
    }
}
