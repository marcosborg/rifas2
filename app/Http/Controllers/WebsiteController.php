<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ContentPage;
use App\Models\Feature;
use App\Models\Page;
use App\Models\Slide;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {

        $slides = Slide::all();
        $section1 = Feature::where('placement', 1)->orderBy('position')->get()->load('page');
        $section2 = Feature::where('placement', 2)->limit(6)->orderBy('position')->get()->load('page');
        $section3 = Feature::where('placement', 3)->orderBy('position')->get()->load('page');

        return view('website.home', compact('slides', 'section1', 'section2', 'section3'));
    }

    public function terms()
    {
        $terms = ContentPage::find(4);
        return view('terms', compact('terms'));
    }

    public function privacy()
    {
        $privacy = ContentPage::find(3);
        return view('privacy', compact('privacy'));
    }

    public function forgetMe()
    {
        return view('forget_me');
    }

    public function accountDelete(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        return redirect()->back()->with('message', 'Pedido enviado com sucesso.');
    }

    public function page($page_id, $slug)
    {

        $page = Page::find($page_id);

        return view('website.page', compact('page'));
    }
}