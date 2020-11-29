

@extends('layouts.content_pages_template')
@section('left-side')
<div class="card">
    <div class="card-header">{{"Edit ".$profile->name}}</div>
    <div class="card-body">
        <form action="{{ route('profile.update', $profile)}}" method="POST">
            @csrf
            {{method_field('PUT')}}
            <div class="form-group row">
                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                <div class="col-md-6">
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $profile->title }}" required autocomplete="title" autofocus>

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                <div class="col-md-6">
                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $profile->description }}" required autocomplete="description">

                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="visibility" class="col-md-4 col-form-label text-md-right">{{ __('Visibility') }}</label>
                <div class="d-flex justify-content-center">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="visibility" value="{{ '0' }}" @if($profile->visibility === 0) checked=checked @endif/>
                        <label class="form-check-label" for="inlineCheckbox1">{{'Everyone'}}</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="visibility" value="{{ '1' }}" @if($profile->visibility === 1) checked=checked @endif/>
                        <label class="form-check-label" for="inlineCheckbox1">{{'Registerd'}}</label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>

        </form>
    </div>
</div>
@endsection
@section('right-side')
@endsection

