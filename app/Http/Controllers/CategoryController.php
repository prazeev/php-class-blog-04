<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories'] = Category::paginate(20);
        return view('admin.categories.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required'
        ]);
        $category = new Category;
        $category->slug = ($request->slug != null) ? str_slug($request->slug, '-') : str_slug($request->title, '-');

        do {
            $validatedSlug = Category::where('slug', $category->slug)->first();
            if($validatedSlug) {
                $category->slug = str_slug($category->slug.' '.rand());
            }
        } while($validatedSlug);

        $category->title = $request->title;
        $category->description = $request->description;
        $category->user_id = auth()->id();
        if($category->save()){
            flash('Category created.')->success();
        } else {
            flash('Category creation failed.')->error();
        }
        return redirect()->action('CategoryController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['category'] = Category::find($id);
        return view('admin.categories.view')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['category'] = Category::find($id);
        return view('admin.categories.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'status' => 'required'
        ]);
        $category = Category::find($id);

        $category->title = $request->title;
        $category->description = $request->description;
        $category->status = $request->status;
        if($category->save()){
            flash('Category Updated.')->success();
        } else {
            flash('Category update failed.')->error();
        }
        return redirect()->action('CategoryController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
