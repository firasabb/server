<?php

namespace App\Http\Controllers;

use App\Downloader;
use Illuminate\Http\Request;
use App\Http\Resources\Downloader as DownloaderResource;

class DownloaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $downloaders = Downloader::simplePaginate(20);
        return view('downloaders', ['downloaders' => $downloaders]);
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
        $vaildator = $request->validate([
            'email' => 'required|unique:downloaders',
            'name' => 'required'
        ]);

        $downloader = new Downloader();
        $downloader->email = $request->email;
        $downloader->name = $request->name;
        $downloader->save();

        return redirect('panel/downloaders');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Downloader  $downloader
     * @return \Illuminate\Http\Response
     */
    public function show($email)
    {
        $downloader = Downloader::where('email', $email)->firstOrFail();
        return view('downloader', ['downloader' => $downloader]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Downloader  $downloader
     * @return \Illuminate\Http\Response
     */
    public function edit(Downloader $downloader)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Downloader  $downloader
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $email)
    {
        $downloader = Downloader::where('email', $email)->firstOrFail();
        $downloader->email = $request->downloader;
        $downloader->name = $request->name;
        $downloader->save();
        return redirect('/panel/downloader/' . $downloader->email);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Downloader  $downloader
     * @return \Illuminate\Http\Response
     */
    public function destroy($email)
    {
        $downloader = Downloader::where('email', $email)->firstOrFail();
        $downloader->delete();
        
        return redirect('/panel/downloaders');
    }


    public function getDownloader($email){

        $downloader = Downloader::where('email', $email)->firstOrFail();
        return new DownloaderResource($downloader);

    }

    public function createDownloader(Request $request){

        $vaildator = $request->validate([
            'email' => 'required|email|unique:downloaders',
            'name' => 'required'
        ]);

        $downloader = new Downloader();
        $downloader->email = $request->email;
        $downloader->name = $request->name;
        $downloader->save();

        return response()->json([
            'success' => 'true',
            'message' => 'Downloader created successfully.'
        ]);

    }
}
