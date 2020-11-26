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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
