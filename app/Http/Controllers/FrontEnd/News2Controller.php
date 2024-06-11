<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\News;
use App\Models\SettingApp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Page;

class News2Controller extends Controller
{
    public function index(Request $request)
    {
        $setting = SettingApp::find(1);
        $page = Page::where('title', '=', 'news')->firstOrFail();

        $news = News::all();
        return view('FrontEnd.news', [
            'setting' => $setting,
            'news' => $news,
            'text' => $page->content,
        ]);
    }
    public function detail($slug)
    {
        $setting = SettingApp::find(1);
        $new = News::where('slug', $slug)->first();
        $relatednews = News::where('slug', '!=', $slug)->get();
        return view('FrontEnd.news-detail', [
            'setting' => $setting,
            'new' => $new,
            'relatednews' => $relatednews
        ]);
    }

}
