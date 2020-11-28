@extends('layouts.content_pages_template')
@section('left-side')
    <table class="table table-striped table-dark">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Roles</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>
                        <a href="{{route('profile.show', $user->profile)}}" class="float-left">
                            {{$user->name}}
                        </a>
                    </td>
                    <td>{{$user->email}}</td>
                    <td>
                        @foreach ($user->roles()->get()->pluck('name')->toArray() as $role)
                            <span class="badge badge-pill badge-info">{{$role}}</span>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{route('admin.users.edit', $user->id)}}" class="float-left">
                            <button type="button" class="btn btn-info">Edit</button>
                        </a>
                        <form action="{{ route('admin.users.destroy', $user)}}" method="POST" class="float-left">
                            @csrf
                            {{method_field('DELETE')}}
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                    </tr>
            @endforeach
        </tbody>
    </table>
@endsection
@section('right-side')
@endsection

