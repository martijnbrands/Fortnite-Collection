<?php

namespace App\Http\Controllers;

use App\Emote;
use Illuminate\Http\Request;

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
        //
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
