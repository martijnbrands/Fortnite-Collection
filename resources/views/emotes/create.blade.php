@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('emotes.store') }}" method="POST" enctype="multipart/form-data">
                @csrf()

                <div class="form-group">
                    <label for="title">Title</label>
                    <input id="title" class="form-control" name="title" type="text" value="{{ old('title') }}"/>

                    @if ($errors->has('title'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="rarity">Rarity</label>
                    <select class="form-control" name="rarity">
                        <option value="" selected>Choose rarity</option>
                        @foreach( App\Emote::getEnumValues('rarity') as $rarity)
                            <option value="{{ $rarity }}" @if(old('rarity') == $rarity) selected @endif>{{ ucfirst($rarity) }}</option>
                        @endforeach
                    </select>
                    
                    @if ($errors->has('title'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="vbucks">Vbucks</label>
                    <input id="vbucks" class="form-control" name="vbucks" type="text" value="{{ old('vbucks') }}"/>

                    @if ($errors->has('vbucks'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('vbucks') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="thumbnail">Thumbnail</label>
                    <input id="thumbnail" class="form-control" name="thumbnail" type="file" value="{{ old('thumbnail') }}"/>

                    @if ($errors->has('thumbnail'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('thumbnail') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="title">Video</label>
                    <input id="video" class="form-control" name="video" type="text" value="{{ old('video') }}"/>

                    @if ($errors->has('video'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('video') }}</strong>
                        </span>
                    @endif
                </div>

                <label>TODO: file upload</label>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Create"/>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection