<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use App\Http\Requests\{StoreSubCategoryRequest, UpdateSubCategoryRequest};
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:sub category view')->only('index', 'show');
        $this->middleware('permission:sub category create')->only('create', 'store');
        $this->middleware('permission:sub category edit')->only('edit', 'update');
        $this->middleware('permission:sub category delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $subCategories = DB::table('sub_categories')
                ->select('sub_categories.*', 'product_categories.nama_kategori')
                ->join('product_categories', 'sub_categories.categori_id', '=', 'product_categories.id')
                ->get();
            return DataTables::of($subCategories)
                ->addIndexColumn()
                ->addColumn('nama_sub_kategori', function ($row) {
                    return str($row->nama_sub_kategori)->limit(100);
                })
                ->addColumn('product_category', function ($row) {
                    return $row->nama_kategori;
                })->addColumn('action', 'sub-categories.include.action')
                ->toJson();
        }

        return view('sub-categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sub-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubCategoryRequest $request)
    {

        SubCategory::create($request->validated());
        Alert::toast('The subCategory was created successfully.', 'success');
        return redirect()->route('sub-categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        $subCategory->load('product_category:id,nama_kategori');

        return view('sub-categories.show', compact('subCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subCategory)
    {
        $subCategory->load('product_category:id,nama_kategori');

        return view('sub-categories.edit', compact('subCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubCategoryRequest $request, SubCategory $subCategory)
    {

        $subCategory->update($request->validated());
        Alert::toast('The subCategory was updated successfully.', 'success');
        return redirect()
            ->route('sub-categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subCategory)
    {
        try {
            $subCategory->delete();
            Alert::toast('The subCategory was deleted successfully.', 'success');
            return redirect()->route('sub-categories.index');
        } catch (\Throwable $th) {
            Alert::toast('The subCategory cant be deleted because its related to another table.', 'error');
            return redirect()->route('sub-categories.index');
        }
    }
}
