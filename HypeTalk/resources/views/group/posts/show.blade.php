@extends('layouts.content_pages_template')
@section('left-side')
    @include('layouts.post_show_template', $post)
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
               <a href="{{route('profile.show', $member)}}" class="badge badge-pill badge-primary p-2 mr-2">{{$member->name}}</a>
            @endforeach
    </div>
</div>
@endsection
