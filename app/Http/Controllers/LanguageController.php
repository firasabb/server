<?php

namespace App\Http\Controllers;

use Storage;
use App\Language;
use Illuminate\Http\Request;
use App\Http\Resources\Languages as LanguagesResource;
use App\Http\Resources\Language as LanguageResource;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languages = Language::all();
        return view('languages', ['languages' => $languages]);
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
            'language' => 'required|unique:languages|max:121',
            'photo' => 'image|max:1000'
        ]);

        $language = new Language();

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

            $language->photo = Storage::url($photoName);

        } else if($photo_link){

                $language->photo = $photo_link;


        }


        $language->language = $request->language;
        $language->save();

        return redirect('/panel/languages/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $language = Language::where('id', $id)->firstOrFail();
        return view('language', ['language' => $language]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function edit(Language $language)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = $request->validate([
            'language' => 'unique:languages|max:121|min:1',
            'photo' => 'image|max:1000'
        ]);

        $language = Language::where('id', $id)->firstOrFail();

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

            $language->photo = Storage::url($photoName);

        } else if($photo_link){


                $language->photo = $photo_link;

        }



        $language->language = $request->language;
        $language->save();

        return redirect('panel/languages/show/' . $language->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $language = Language::where('id', $id)->firstOrFail();
        $language->delete();

        return redirect('panel/languages/');
    }

    public function getLanguages(){
        $languages = Language::all();
        return new LanguagesResource($languages);
    }

    public function getLanguage($language){
        $getLanguage = Language::where('language', $language)->firstOrFail();
        return new LanguageResource($getLanguage);
    }
}
