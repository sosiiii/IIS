@extends('layouts.content_pages_template')

@section('header')
<ul class="nav nav-pills justify-content-center bg-light p-2" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Posts</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Comments</a>
    </li>
  </ul>
@endsection
@section('left-side')
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        @foreach ($posts as $post)
            @include('layouts.post_template', $post)
        @endforeach
    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        @foreach ($comments as $comment)
            @include('layouts.comment_template', $comment)
        @endforeach
    </div>
</div>

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
        @can('update', $profile)
            <div class="d-flex justify-content-center"><a href="{{route('profile.edit', $profile->user)}}"><button type="button" class="btn btn-info">Edit</button></a></div>
        @endcan
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
