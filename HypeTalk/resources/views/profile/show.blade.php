@extends('layouts.content_pages_template')

@section('header')
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm justify-content-center">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#" style="border-bottom: 3px solid darkgray;">POSTS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">COMMENTS</a>
            </li>
        </ul>
    </nav>
@endsection
@section('left-side')
    @foreach ($posts as $post)
        @include('layouts.post_template', $post)
    @endforeach

@endsection
@section('right-side')
<div class="d-flex flex-column shadow-sm p-2 mb-4" style="background-color: #ebebeb;">
    <div class="d-flex flex-row">
        <div class="col"><img src="https://i.stack.imgur.com/l60Hf.png" class="img-thumbnail rounded"></div>
        <div class="col">
            <div class="d-flex flex-column">
                <div>
                    <h3>{{$profile->user->name}}</h3>
                    <h6>{{date("m/d/Y", strtotime($profile->user->created_at))}}</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex flex-column">
        <div class="d-flex justify-content-center">karma</div>
        <div class="d-flex justify-content-center"><a href="{{route('profile.edit', $profile->user)}}"><button type="button" class="btn btn-info">Edit</button></a></div>
    </div>
</div>
<div class="d-flex flex-column shadow-sm p-2 mb-4" style="background-color: #ebebeb;">
    <div class="d-flex flex-row">
        <div class=""><h4>{{$profile->title}}</h4></div>
    </div>
    <div class="d-flex flex-column">
        <div class="d-flex justify-content-center">{{$profile->description}}</div>
    </div>
</div>
<div class="d-flex flex-column shadow-sm p-2 mb-4" style="background-color: #ebebeb;">
    <div class="d-flex flex-row">
        <div class=""><h4>{{"Groups I follow"}}</h4></div>
    </div>
    <div class="d-flex flex-wrap">
            @foreach ($groups as $group)
               <a href="{{route('group.show', $group)}}" class="badge badge-pill badge-primary p-2 mr-2 mb-2">{{$group->name}}</a>
            @endforeach
    </div>
</div>
@endsection
