<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use \App\Word;

class AdminController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['role:admin']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('panel');
    }


    public function photosPage(){
        

        $photos = Storage::disk('images')->allFiles();
        return view('photos', ['photos' => $photos]);

    }


    public function uploadPhoto(Request $request){

        $validator = $request->validate([
            'photo' => 'required|image|max:1000'
        ]);

        $photo = $request->file('photo');

        $photoName = $request->file('photo')->getClientOriginalName();

        $checker = Storage::disk('images')->has($photoName);

        if($checker){

            $rand = rand(1, 9);

            $photoName = $rand . $photoName;

            $path = $photo->storeAs('/',$photoName, 'images');

        } else {

        $path = $photo->storeAs('/', $photoName, 'images');

        }

        return redirect('/panel/photos');
    }


    public function deletePhoto($photo){
        $photoToDelete = Storage::disk('images')->delete($photo);
        $words = Word::where('photo', $photo)->get();
        if($words){
            foreach($words as $word){
                $word->photo = '';
                $word->save();
            }
        }
        return redirect('/panel/photos');
    }
}
