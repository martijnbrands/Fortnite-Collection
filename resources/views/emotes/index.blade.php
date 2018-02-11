@extends('layouts.app')

@section('content')

@auth
    <div class="container">
        <div class="page-actions clearfix mb-3 text-right">
            @can('create', App\Emote::class)
                <a href="{{ route('emotes.create') }}" class="btn btn-primary">Add emote</a>
            @endcan
        </div>
    </div>
@endauth

<div class="container emote-grid">
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

            <img src="{{ $emote->thumb }}" alt="{{ $emote->title }}"/>

            <div class="emote-title">
                {{ $emote->title }}
            </div>
        </div>
    @empty
        There are currently no emotes to show.
    @endforelse
</div>
@endsection