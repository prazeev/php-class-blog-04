<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function index() {
        $data['posts'] = Post::with('category')->where('user_id', auth()->id())->get();
        return view('site.post-list')->with($data);
    }

    public function create(Request $request) {
        $request->validate([
            'title' => 'required|max:255',
            'details' => 'required',
            'subtitle' => 'required|max:255',
            'category_id' => 'required'
        ]);
        $post = new Post;
        $post->slug = str_slug($request->title, '-');
        do {
            $validatedSlug = Post::where('slug', $post->slug)->first();
            if($validatedSlug) {
                $post->slug = str_slug($post->slug.' '.rand());
            }
        } while($validatedSlug);

        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->details = $request->details;
        $post->category_id = $request->category_id;
        $post->user_id = auth()->id();
        if($post->save()){
            return redirect()->route('user.profile');
        }
        return redirect()->route('user.profile');
    }
}
