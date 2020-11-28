@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>{{$group->name}}</h2>
                        <button-join-group group-id="{{$group->id}}" role="{{$role}}"></button-join-group>
                    </div>
                </div>
                <div class="card-body">
                    {{$group->description}}
                    <a href="{{route('group.posts.create', $group->id)}}" class="float-left">
                        <input class="form-control" type="text" placeholder="Create new post" aria-label="Search" disabled>
                    </a>
                </div>
            </div>
            @foreach ($group->posts as $post)
                <div>
                    <div class="d-flex flex-column shadow-sm mb-3" style="background-color: #ebebeb;">
                        <div class="d-flex flex-row">
                            <div class="p-1" style="background-color: #e0e0e0 !important;">
                                <div class="d-flex flex-column" >
                                    <up-down-vote-post post-id="{{$post->id}}" post-rating="{{$post->ratings->sum('value')}}"></up-down-vote-post>
                                </div>
                            </div>
                            <div class="mx-3">
                                <div class="d-flex flex-column">
                                    <div class="mt-1" style="cursor: pointer;" onclick="location.href='{{route('group.show', $post->group)}}';">{{'group/'.$post->group->name}}</div>
                                    <div class="d-flex flex-column" style="cursor: pointer;" onclick="location.href='{{route('group.posts.show', [$post->group, $post])}}';">
                                        <div class="mb-2"><h3>{{$post->title}}</h3></div>
                                        <div class="mb-4">{{$post->description}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-1">
                                <div class="d-flex flex-column" >
                                    <up-down-vote-post></up-down-vote-post>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
    </div>
</div>
@endsection
