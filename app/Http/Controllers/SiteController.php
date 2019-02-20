<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index() {
        $data['categories'] = Category::limit(3)->get();
        return view('site.home')->with($data);
    }

    public function categoryPage($slug) {
        $category = Category::where('slug', $slug)->first();
        if(!$category) {
            return abort(404);
        }
        return $category;
    }
}
