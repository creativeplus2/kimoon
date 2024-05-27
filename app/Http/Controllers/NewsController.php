<?php

namespace App\Http\Controllers;

use Image;
use App\Models\news;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

use App\Http\Requests\{StoreNewsRequest, UpdateNewsRequest};

class NewsController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:news view')->only('index', 'show');
        $this->middleware('permission:news create')->only('create', 'store');
        $this->middleware('permission:news edit')->only('edit', 'update');
        $this->middleware('permission:news delete')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $news = news::query();

            return DataTables::of($news)
                ->addIndexColumn()
                ->addColumn('created_at', function ($row) {
                    return $row->created_at->format('d M Y H:i:s');
                })->addColumn('updated_at', function ($row) {
                    return $row->updated_at->format('d M Y H:i:s');
                })

                ->addColumn('action', 'news.include.action')
                ->toJson();
        }

        return view('news.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNewsRequest $request)
    {

        $attr = $request->validated();
        if ($request->file('featured_image') && $request->file('featured_image')->isValid()) {
            $path = storage_path('app/public/uploads/featuredimage/');
            $filename = $request->file('featured_image')->hashName();

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            Image::make($request->file('featured_image')->getRealPath())->resize(500, 500, function ($constraint) {
                $constraint->upsize();
                $constraint->aspectRatio();
            })->save($path . $filename);

            $attr['featured_image'] = $filename;
        }
        $attr['slug'] = Str::slug($request->title);

        news::create($attr);
        return redirect()->route('news.index')->with('success', 'News created successfully!');


    }

    /**
     * Display the specified resource.
     */
    public function show(news $id)
    {
        $news = news::findOrFail($id);
        return view('news.edit', ['news' => $news]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(news $news)
    {
        // $news = news::findOrFail($id);
        return view('news.edit', compact('news'));

        // return view('news.edit', ['news' => $news]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNewsRequest $request, news $news)
    {

        $attr = $request->validated();
        if ($request->file('featured_image') && $request->file('featured_image')->isValid()) {

            $path = storage_path('app/public/uploads/featuredimage/');
            $filename = $request->file('featured_image')->hashName();

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            Image::make($request->file('featured_image')->getRealPath())->resize(500, 500, function ($constraint) {
                $constraint->upsize();
                $constraint->aspectRatio();
            })->save($path . $filename);

            // delete old logo_bank from storage
            if ($news->featured_image != null && file_exists($path . $news->featured_image)) {
                unlink($path . $news->featured_image);
            }

            $attr['featured_image'] = $filename;
        }
        $attr['slug'] = Str::slug($request->title);

        // dd($news);
        $news->update($attr);
        Alert::toast('The News was updated successfully.', 'success');
        return redirect()->route('news.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(news $news)
    {
        $news->delete();
        Alert::toast('The News was deleted successfully.', 'success');
        return redirect()->route('news.index');
    }
}
