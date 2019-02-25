<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index() {
        $data['categories'] = Category::limit(3)->get();
        $data['posts'] = Post::with('category','user')->orderBy('id','DESC')->paginate(10);
        return view('site.home')->with($data);
    }
    public function singlePage($category_slug, $post_slug) {
        $data['categories'] = Category::limit(3)->get();
        $category = Category::where('slug',$category_slug)->first();
        if(!$category)
            abort(404);
        $post = Post::with('category','user')->where('slug', $post_slug)->where('category_id', $category->id)->first();
        if(!$post)
            abort(404);

        $data['post'] = $post;
        return view('site.post')->with($data);
    }
    public function categoryPage($slug) {
        $data['categories'] = Category::limit(3)->get();
        $category = Category::where('slug', $slug)->first();
        if(!$category) {
            return abort(404);
        }
        $data['posts'] = Post::with('category','user')->where('category_id', $category->id)->orderBy('id','DESC')->paginate(20);
        return view('site.home')->with($data);
    }
}
