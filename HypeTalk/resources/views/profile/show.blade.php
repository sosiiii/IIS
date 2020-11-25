@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>{{$profile->title}}</h2>
                        @can('edit-profile', $profile)
                        <a href="{{route('profile.edit', $profile)}}" class=" ml-3 float-right">
                            <button type="button" class="btn btn-info">Edit</button>
                        </a>
                        @endcan
                    </div>
                    {{$profile->user->name . ' profile'}}
                </div>
                <div class="card-body">
                    {{$profile->description}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
