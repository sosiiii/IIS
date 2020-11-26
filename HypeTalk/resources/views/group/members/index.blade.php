@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <table class="table table-striped table-dark">
                    <h1>{{$group->name.' members'}}</h1>
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($members as $member)
                            <tr>
                                <th scope="row">{{$member->id}}</th>
                                <td>
                                    <a href="{{route('profile.show', $member->profile)}}" class="float-left">
                                        {{$member->name}}
                                    </a>
                                </td>
                                <td>{{$member->email}}</td>
                                <td>
                                    <span class="badge badge-pill badge-info">{{$member->pivot->role}}</span>
                                </td>
                                <td>
                                    <a href="{{route('group.members.update', [$group, $member])}}" class="float-left">
                                        <button type="button" class="btn btn-info">Edit</button>
                                    </a>
                                </td>
                                </tr>
                        @endforeach
                    </tbody>
                    </table>

        </div>
    </div>
</div>
@endsection
