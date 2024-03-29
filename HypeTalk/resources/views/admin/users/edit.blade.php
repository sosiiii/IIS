

@extends('layouts.content_pages_template')
@section('left-side')
<div class="card">
    <div class="card-header">{{"Edit ".$user->name}}</div>
    <div class="card-body">
        <form action="{{ route('admin.users.update', $user)}}" method="POST">
            @csrf
            {{method_field('PUT')}}
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Roles') }}</label>
                <div class="d-flex justify-content-center">
                    @foreach ($roles as $role)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="roles[]" value="{{ $role->id }}" @if($user->roles->contains($role->id)) checked=checked @endif/>
                        <label class="form-check-label" for="inlineCheckbox1">{{$role->name}}</label>
                    </div>
                    @endforeach
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>

        </form>
    </div>
</div>
@endsection
@section('right-side')
@endsection

