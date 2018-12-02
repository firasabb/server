<?php

namespace App\Http\Controllers;

use App\Word;
use App\Language;
use App\Category;
use Illuminate\Http\Request;
use Storage;
use App\Http\Resources\Word as WordResource;
use App\Http\Resources\WordCollection as WordResourceCollection;

class WordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $words = Word::simplePaginate(20);


        $languages = Language::all();
        $languagesArr = array();

        foreach($languages as $language){
            $languagesArr[$language->language] = $language->language;
        }

        $categories = Category::all();
        $categoriesArr = array();

        foreach($categories as $category){
            $categoriesArr[$category->category] = $category->category;
        }

        return view('words', ['words' => $words, 'languagesArr' => $languagesArr, 'categoriesArr' => $categoriesArr]);
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
            'title' => 'required|unique:words|max:121',
            'description' => 'required',
            'tagline' => 'required',
            'androidlink' => 'required',
            'ioslink' => 'required',
            'eligibility' => 'required',
            'rating_us' => 'required|integer|max:5',
            'rating_visitors' => 'required|integer|max:5',
            'language' => 'required|exists:languages',
            'category' => 'required|exists:categories',
            'photo' => 'image|max:1000',
            'color' => 'required',
            'payment' => 'required'
        ]);

        $word = new Word();
        
        $photo = $request->file('photo');

        $photo_link = $request->photo_link;

        if($photo){
            $photoName = $request->file('photo')->getClientOriginalName();

            $checker = Storage::has($photoName);

            if($checker){

                $rand = rand(1, 9);

                $photoName = $rand . $photoName;

                $path = $photo->storeAs('/',$photoName);

            } else {

                $path = $photo->storeAs('/', $photoName);

            }

            $word->photo = Storage::url($photoName); 

        } else if($photo_link){

                $word->photo = $photo_link;


        }

        if(!$request->sponsored){
            $word->sponsored = 0;
        } else {
            $word->sponsored = $request->sponsored;
        }


        $languageName = $request->language;
        $language = Language::where('language', $languageName)->firstOrFail();

        $categoryName = $request->category;
        $category = Category::where('category', $categoryName)->firstOrFail();
        
        $word->title = $request->title;
        $word->tagline = $request->tagline;
        $word->description = $request->description;
        $word->rating_visitors = $request->rating_visitors;
        $word->rating_us = $request->rating_us;
        $word->eligibility = $request->eligibility;
        $word->androidlink = $request->androidlink;
        $word->ioslink = $request->ioslink;
        $word->payment = $request->payment;
        $word->color = $request->color;
        $word->language()->associate($language);
        $word->category()->associate($category);
        $word->save();

        return redirect('/panel/words/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Word  $word
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $word = Word::where('id', $id)->firstOrFail();

        $languages = Language::all();
        $languagesArr = array();
        

        foreach($languages as $language){
            $languagesArr[$language->language] = $language->language;
        }


        $categories = Category::all();
        $categoriesArr = array();

        foreach($categories as $category){
            $categoriesArr[$category->category] = $category->category;
        }


        return view('word', ['word' => $word, 'languagesArr' => $languagesArr, 'categoriesArr' => $categoriesArr]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Word  $word
     * @return \Illuminate\Http\Response
     */
    public function edit(Word $word)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Word  $word
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = $request->validate([
            'language' => 'required|exists:languages',
            'photo' => 'image|max:1000'
        ]);


        $word = Word::where('id', $id)->firstOrFail();


        $photo = $request->file('photo');

        $photo_link = $request->photo_link;

        if($photo){
            $photoName = $request->file('photo')->getClientOriginalName();

            $checker = Storage::has($photoName);

            if($checker){

                $rand = rand(1, 9);

                $photoName = $rand . $photoName;

                $path = $photo->storeAs('/',$photoName);

            } else {

                $path = $photo->storeAs('/', $photoName);

            }

            $word->photo = $photoName;           
        } else if($photo_link){


                $word->photo = $photo_link;

        }

        if(!$request->sponsored){
            $word->sponsored = 0;
        } else {
            $word->sponsored = $request->sponsored;
        }

        $languageName = $request->language;
        $language = Language::where('language', $languageName)->firstOrFail();

        $categoryName = $request->category;
        $category = Category::where('category', $categoryName)->firstOrFail();

        
        $word->title = $request->title;
        $word->tagline = $request->tagline;
        $word->description = $request->description;
        $word->rating_visitors = $request->rating_visitors;
        $word->rating_us = $request->rating_us;
        $word->eligibility = $request->eligibility;
        $word->androidlink = $request->androidlink;
        $word->ioslink = $request->ioslink;
        $word->payment = $request->payment;
        $word->color = $request->color;
        $word->language()->associate($language);
        $word->category()->associate($category);
        $word->save();

        return redirect('/panel/words/show/' . $word->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Word  $word
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $word = Word::where('id', $id)->firstOrFail();
        $word->delete();

        return redirect('/panel/words/');
    }


    public function getWordApi($word){

        $getWord = Word::where('title', $word)->firstOrFail();
        return new WordResource($getWord);

    }

    public function getWordsApi(){

        $words = Word::all();
        return new WordResourceCollection($words);
        
    }


    public function getWordsLanguage($language){

        $_language = Language::where('language', $language)->firstOrFail();

        $words = Word::where('language_id', $_language->id)->orderBy('id', 'desc');

        $_words = $words->paginate(5);

        return new WordResourceCollection($_words);
        
    }

}
