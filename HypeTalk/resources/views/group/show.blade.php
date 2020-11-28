@extends('layouts.content_pages_template')

@section('header')
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm justify-content-center">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#" style="border-bottom: 3px solid darkgray;">{{$group->name}}</a>
            </li>
            <li class="nav-item">
                <button-join-group group-id="{{$group->id}}" role="{{$role}}"></button-join-group>
            </li>
        </ul>
    </nav>
@endsection
@section('left-side')
<div class="d-flex flex-column shadow-sm p-2 mb-4" style="background-color: #ebebeb;">
<a href="{{route('group.posts.create', $group->id)}}" class="float-left">
    <input class="form-control" type="text" placeholder="Create new post" aria-label="Search">
</a>
</div>
    @foreach ($posts as $post)
        @include('layouts.post_template', $post)
    @endforeach
@endsection
@section('right-side')
<div class="d-flex flex-column shadow-sm p-2 mb-4" style="background-color: #ebebeb;">
    <div class="d-flex flex-row">
        <div class=""><h4>{{"About our group"}}</h4></div>
    </div>
    <div class="d-flex flex-column">
        <div class="d-flex justify-content-center">{{$group->description}}</div>
    </div>
</div>
<div class="d-flex flex-column shadow-sm p-2 mb-4" style="background-color: #ebebeb;">
    <div class="d-flex flex-row">
        <div class=""><h4>{{"Members"}}</h4></div>
    </div>
    <div class="d-flex flex-wrap">
            @foreach ($group->members as $member)
               <a href="{{route('profile.show', $member)}}" class="badge badge-pill badge-primary p-2 mr-2 mb-2">{{$member->name}}</a>
            @endforeach
    </div>
</div>
@endsection
