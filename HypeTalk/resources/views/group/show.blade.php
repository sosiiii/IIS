@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>{{$group->name}}</h2>
                        <button-join-group group-id="{{$group->id}}"></button-join-group>
                        @can('group-edit', $group)
                        <a href="{{route('group.edit', $group)}}" class="ml-3 float-right">
                            <button type="button" class="btn btn-info">Edit</button>
                        </a>
                        <a href="{{route('group.members.index', $group)}}" class="ml-3 float-right">
                            <button type="button" class="btn btn-info">Manage members</button>
                        </a>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    {{$group->description}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
