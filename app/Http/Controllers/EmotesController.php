<?php

namespace App\Http\Controllers;

use App\Emote;
use Illuminate\Http\Request;
Use Image;
Use File;

class EmotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emotes = Emote::all();
        return view('emotes.index', compact('emotes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Emote::class);

        return view('emotes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       request()->validate([
            'title' => 'required|string',
            'rarity' => 'required|string',
            'vbucks' => 'required|string',
            'video' => 'required|string'
            
        ]);

        if($request->thumbnail != ""){

            $thumbnail = $request->file('thumbnail');
                    
            $fileName = str_slug($request->name) . '.' . $thumbnail->getClientOriginalExtension();
            Image::make($thumbnail)->save(public_path('images/emotes/' . $fileName));

        }

        Emote::create([
            'title' => request('title'),
            'rarity' => request('rarity'),
            'vbucks' => request('vbucks'),
            'thumbnail' => $fileName,
            'video' => request('video'),
        ]);



        return redirect('/emotes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Emote  $emote
     * @return \Illuminate\Http\Response
     */
    public function show(Emote $emote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Emote  $emote
     * @return \Illuminate\Http\Response
     */
    public function edit(Emote $emote)
    {
        $this->authorize('update', $emote);

        return view('emotes.edit', compact('emote'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Emote  $emote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Emote $emote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Emote  $emote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Emote $emote)
    {
        //
    }
}
