<?php

namespace App\Http\Controllers;

use App\Category;
use App\Language;
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
        $categories = Category::simplePaginate(20);


        $languages = Language::all();
        $languagesArr = array();

        foreach($languages as $language){
            $languagesArr[$language->language] = $language->language;
        }

        return view('categories', ['categories' => $categories, 'languagesArr' => $languagesArr]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'category' => 'required',
            'language' => 'required|exists:languages'
        ]);

        $languageName = $request->language;
        $language = Language::where('language', $languageName)->firstOrFail();

        $category = new Category();
        $category->category = $request->category;
        $category->language()->associate($language);
        $category->save();

        return redirect('/panel/categories/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::where('id', $id)->firstOrFail();

        $languages = Language::all();
        $languagesArr = array();

        foreach($languages as $language){
            $languagesArr[$language->language] = $language->language;
        }


        return view('category', ['category' => $category, 'languagesArr' => $languagesArr]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = $request->validate([
            'language' => 'exists:languages'
        ]);

        $category = Category::where('id', $id)->firstOrFail();

        $languageName = $request->language;
        $language = Language::where('language', $languageName)->firstOrFail();

        $category->category = $request->category;
        $category->language()->associate($language);
        $category->save();

        return redirect('/panel/categories/show/' . $category->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::where('id', $id)->firstOrFail();
        $category->delete();

        return redirect('/panel/categories/');
    }
}
