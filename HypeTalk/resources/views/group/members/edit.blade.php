@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{"Edit ".$member->name}}</div>
                <div class="card-body">
                    <form action="{{ route('group.members.update', [$group->id, $member->id])}}" method="POST">
                        @csrf
                        {{method_field('PUT')}}
                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Roles') }}</label>
                            <div class="d-flex justify-content-center">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="role" value="{{ 'admin' }}" @if(!strcmp($member->pivot->role, 'admin')) checked=checked @endif/>
                                    <label class="form-check-label" for="inlineCheckbox1">{{'Admin'}}</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="role" value="{{ 'moderator' }}" @if(!strcmp($member->pivot->role, 'moderator')) checked=checked @endif/>
                                    <label class="form-check-label" for="inlineCheckbox1">{{'Moderator'}}</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="role" value="{{ 'member' }}" @if(!strcmp($member->pivot->role, 'member')) checked=checked @endif/>
                                    <label class="form-check-label" for="inlineCheckbox1">{{'Member'}}</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input disabled class="form-check-input" type="radio" name="role" value="{{ 'member_request' }}" @if(!strcmp($member->pivot->role, 'member_request')) checked=checked @endif/>
                                    <label class="form-check-label" for="inlineCheckbox1">{{'Member request'}}</label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
