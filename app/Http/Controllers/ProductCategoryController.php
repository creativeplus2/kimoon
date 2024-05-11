<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use App\Http\Requests\{StoreProductCategoryRequest, UpdateProductCategoryRequest};
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class ProductCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:product category view')->only('index', 'show');
        $this->middleware('permission:product category create')->only('create', 'store');
        $this->middleware('permission:product category edit')->only('edit', 'update');
        $this->middleware('permission:product category delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $productCategories = ProductCategory::query();

            return DataTables::of($productCategories)
                ->addIndexColumn()
                ->addColumn('created_at', function ($row) {
                    return $row->created_at->format('d M Y H:i:s');
                })->addColumn('updated_at', function ($row) {
                    return $row->updated_at->format('d M Y H:i:s');
                })

                ->addColumn('action', 'product-categories.include.action')
                ->toJson();
        }

        return view('product-categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductCategoryRequest $request)
    {
        
        ProductCategory::create($request->validated());
        Alert::toast('The productCategory was created successfully.', 'success');
        return redirect()->route('product-categories.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategory $productCategory)
    {
        return view('product-categories.show', compact('productCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCategory $productCategory)
    {
        return view('product-categories.edit', compact('productCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductCategoryRequest $request, ProductCategory $productCategory)
    {
        
        $productCategory->update($request->validated());
        Alert::toast('The productCategory was updated successfully.', 'success');
        return redirect()
            ->route('product-categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategory $productCategory)
    {
        try {
            $productCategory->delete();
            Alert::toast('The productCategory was deleted successfully.', 'success');
            return redirect()->route('product-categories.index');
        } catch (\Throwable $th) {
            Alert::toast('The productCategory cant be deleted because its related to another table.', 'error');
            return redirect()->route('product-categories.index');
        }
    }
}
