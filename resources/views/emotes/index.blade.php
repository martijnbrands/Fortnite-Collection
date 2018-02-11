@extends('layouts.app')

@section('content')
<div class="container">
    @forelse($emotes as $emote)
        <div class="single-emote {{ $emote->rarity }}">
            @can ('update', $emote)
                <div class="edit">
                    <a href="{{ route('emotes.edit', $emote->id)}}">Edit</a>
                </div>
            @endcan
            
            <div class="emote-price">
                {{ $emote->vbucks }}
            </div>

            <img src="{{ $emote->thumbnail }}" alt="$emote->title"/>
            
            <div class="emote-title">
                {{ $emote->title }}
            </div>
        </div>
    @empty
        There are currently no emotes to show.
    @endforelse
</div>
@endsection