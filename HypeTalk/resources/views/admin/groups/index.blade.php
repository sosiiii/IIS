@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <table class="table table-striped table-dark">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($groups as $group)
                            <tr>
                                <th scope="row">{{$group->id}}</th>
                                <td>
                                    <a href="{{route('group.show', $group->id)}}" class="float-left">
                                        {{$group->name}}
                                    </a>
                                </td>
                                <td>
                                    <span class="badge badge-pill badge-info">{{$group->members()->find(auth()->user()->id)->pivot->role}}</span>
                                </td>
                                </tr>
                        @endforeach
                    </tbody>
                    </table>

        </div>
    </div>
</div>
@endsection
