@extends('layouts.content_pages_template')


<?php 
use App\Models\User;
use App\Models\Group;
$user = User::all()->where('id', $profile->user_id)->first();
$group_ids = DB::table('group_user')->where('user_id', $profile->user_id)->pluck('group_id');
$user_groups = Group::all()->whereIn('id', $group_ids);

$authorized = $profile->user_id == Auth::id() || $user->isAdmin(); 
?>
@section('header')
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm justify-content-center">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#" style="border-bottom: 3px solid darkgray;">OVERVIEW</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">POSTS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">COMMENTS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">UPVOTED</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">DOWNWOTED</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">FOLLOWED</a>
            </li>
        </ul>
    </nav>
@endsection

@section('left-side')
    <div class="container my-container">
        <div class="row my-row shadow-lg bg-white rounded mb-0" style="min-height:50px; max-height:100px;">
            <div class="col my-col">
                <div class="row justify-content-center">
                    
                    <ul style="  list-style-type: none;  margin: 0;  padding: 0;  overflow: hidden;">
                        <li style="float: left;">
                            <div class="col justify-content-center m-2 border-right" style="max-width:50px;">
                                <a href="#" style="color:orange;">
                                    <div class="row justify-content-center">
                                        <i class="fas fa-baby-carriage"></i>
                                    </div>
                                    <div class="row justify-content-center">
                                        NEW
                                    </div>
                                </a>
                            </div>
                        </li>
                        <li style="float: left; ">

                            <div class="col justify-content-center m-2" style="max-width:50px;">
                                <div class="row justify-content-center">
                                    <i class="fas fa-fire-alt"></i>
                                </div>
                                <div class="row justify-content-center">
                                    HOT
                                </div>
                            </div>
                        </li>
                        <li style="float: left;">
                            <div class="col justify-content-center m-2 border-left" style="max-width:50px;">
                                <div class="row justify-content-center">
                                    <i class="fas fa-angle-double-up"></i>
                                </div>
                                <div class="row justify-content-center">
                                    TOP
                                </div>
                                
                            </div>

                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>

    <?php $post_content = [
            'post_group' => "/leagueoflegends",

            'post_header' => "How is this still in the game? Is it even real life. Llkdajfklasjd dsfaklj
            asdjklf ljkas",
            
            'post_body' => "Lorem loremipsum dolor sit amet consectetur adipisicing elit. Consequatur eius
            accusantium laboriosam qui explicabo, placeat ullam alias commodi atque! Doloribus
            sequi at nostrum vel cum temporibus. Cumque nesciunt officiis adipisci facilis
            repellendus tempore rem aut recusandae, deleniti maxime et ducimus! Suscipit in a
            tempore ut aliquid voluptas voluptate aut expedita?
            , placeat ullam alias commodi atque! Doloribus
            sequi at nostrum vel cum temporibus. Cumque nesciunt officiis adipisci facilis
            repellendus tempore rem aut recusandae, deleniti maxime et ducimus! Suscipit in a
            tempore ut aliquid voluptas voluptate aut expedita?, placeat ullam alias commodi
            atque! Doloribus"

    ] ?>
    @foreach ([1, 2 ,3 ,4 ,5] as $post)
        @include("layouts.post_template", $post_content)
    @endforeach
@endsection

@section('right-side')
    <div class="row my-row justify-content-center" style="padding-bottom:20px">
        <div class="card shadow-lg border-secondary" style="width:400px;background-color:#e0e0e0">
            <div class="card-body d-flex flex-row">
                <div class="card-body flex-column my-img">
                    @if($authorized)
                        <a href="#" style="color:black">
                            <i class="fas fa-upload" style="font-size:30px"></i>
                        </a>
                    @endif
                    <img src="/smh.png" class="card-img-top rounded-circle" alt="Card image" style="width:120px;"> 
                </div>
                <div class="card-body flex-column">
                    <h3 class="card-title justify-content-center" style="text-align:center">{{ $profile->title }}</h3>
                    Active since:
                    <h5 class="card-text">
                        <i class="fas fa-calendar-day" style="vertical-align:top; font-size:18px"></i>
                        <?php echo date("m/d/Y", strtotime($profile->created_at)) ?>
                    </h5>
                </div>
            </div>
            <div class="card-body d-flex flex-row justify-content-center" style="font-size:18px">
                <?php 
                $num_posts = 0;
                $num_comments = 0;
                $num_groups = $user->groups->count();
                $karma_count = $num_posts*3 + $num_comments*0.5 + $num_groups*0.3;
                $user_level = 0;
                if ($karma_count >= 500) {
                    $user_level = 5;
                } 
                else if ($karma_count >= 100) {
                    $user_level = 4;
                } 
                else if ($karma_count >= 30) {
                    $user_level = 3;
                } 
                else if ($karma_count >= 5) {
                    $user_level = 2;
                } 
                else if ($karma_count > 0){
                    $user_level = 1;
                } 
                ?>
                lvl. {{$user_level}}
                @foreach ([1,2,3,4,5] as $stars)
                    @if ($stars <= $user_level)
                        <i class="fas fa-star ml-1" style="font-size:25px; color:yellow;"></i>
                    @else
                        <i class="far fa-star ml-1" style="font-size:25px"></i>
                    @endif
                @endforeach
            </div>
            
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

            <div class="card-body d-flex flex-row justify-content-center" style="font-size:19px;">
                <a href="#" data-toggle="popover" title="Karma count" data-placement="bottom" 
                data-content=
                "{{$num_posts}} posts.
                 {{$num_comments}} comments.
                 In {{$num_groups}} groups.">
                {{$karma_count}} karma.</a>
            </div>
            <div class="card-body d-flex flex-row justify-content-center" style="font-size:19px;" data-toggle="collapse" data-target="#demo">
                <a href="#">More options.</a>
            </div>

            <div id="demo" class="collapse">
                <div class="jumbotron">
                <div class="row border-bottom border-secondary justify-content-center"style="font-size:19px;">
                    karma.
                </div>
                <div class="row border-bottom border-bottom justify-content-center">
                 {{$num_posts}} posts.
                </div>
                <div class="row border-bottom border-bottom justify-content-center">
                 {{$num_comments}} comments.
                </div>
                <div class="row border-bottom border-secondary justify-content-center">
                 In {{$num_groups}} groups.
                </div>
                @if ($authorized)
                <div class="row justify-content-center"style="font-size:19px;">
                    <a href="/profile/{{$user->id}}/edit">Edit account information.</a> 
                </div></div>
                @endif
            </div>

            <script>
                $(document).ready(function(){
                $('[data-toggle="popover"]').popover();   
                });
            </script>

        </div>
    </div>
    
    <div class="row my-row" style="padding-bottom:20px">
        <div class="jumbotron flex-fill card shadow-lg border-secondary" style="width:400px;">
            @if ($profile->description != "N/A")
                <h4>Description: 
                    @if ($authorized)
                    <a href="#" style="color:black" data-toggle="modal" data-target="#myModal">
                        <small class="ml-5" style="font-size: 13px"> make a change </small>
                        <i class="fas fa-edit ml-2" style="font-size:20px"></i>
                    </a>
                    @endif
                </h4>
                <p>
                    {{ $profile->description }}
                </p>
            @elseif ($authorized)
                <h4>Description:</h4>
                <p>
                    {{"Add description to your profile."}}
                    <a href="#" style="color:black" data-toggle="modal" data-target="#myModal">
                        <i class="fas fa-edit fa-lg" style="font-size:20px"></i>
                    </a>
                </p>
            @else
                <h4>Description:</h4>
                <p>
                    {{"No description"}}
                </p>
            @endif
        </div>
    </div>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Open modal
    </button>

    <!-- The Modal -->
    <div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Change the description</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <form action={{ route('profile.update', $profile) }} method="post">
            @csrf
            {{method_field('PUT')}}
        <div class="modal-body">
            <div class="form-group row">
                <textarea rows="3"  id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $profile->description }}" required autocomplete="description">Your description here</textarea>
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="submit" class="btn btn-success">Change description</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </form>

        </div>
    </div>
    </div>
@endsection

@section('footer', 'footer')