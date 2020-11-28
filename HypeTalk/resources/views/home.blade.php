@extends('layouts.content_pages_template')


@section('left-side')
@foreach ($posts as $post)
    @include('layouts.post_template', $post)
@endforeach
@endsection
@section('right-side')
<div class="d-flex flex-column shadow-sm p-2 mb-4" style="background-color: #ebebeb;">
    <div class="d-flex flex-row">
        <div class=""><h4>{{"Popular groups"}}</h4></div>
    </div>
    <div class="d-flex flex-wrap">
            @foreach ($groups as $group)
               <a href="{{route('group.show', $group)}}" class="badge badge-pill badge-primary p-2 mr-2 mb-2">{{$group->name}}</a>
            @endforeach
    </div>
</div>
@endsection

