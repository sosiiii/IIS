@extends('layouts.app')


<?php $authorized = $profile->user_id == Auth::id(); ?>

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
                    ahoj

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
        <div class="card shadow-lg border" style="width:400px;background-color:#e0e0e0">
            <div class="card-body d-flex flex-row">
                <div class="card-body flex-column my-img">
                    @if($authorized)
                        <a href="#" style="color:black">
                            <i class="fas fa-upload" style="font-size:40px"></i>
                        </a>
                    @endif
                    <img src="/smh.png" class="card-img-top rounded-circle" alt="Card image" style="width:120px;"> 
                </div>
                <div class="card-body flex-column">
                    <h3 class="card-title justify-content-center" style="text-align:center">{{ $profile->title }}</h3>
                    Active since:
                    <h5 class="card-text">
                        <i class="fas fa-calendar-day" style="vertical-align:top; font-size:21px"></i>
                        <?php echo date("m/d/Y", strtotime($profile->created_at)) ?>
                    </h5>
                </div>
            </div>
            <div class="card-body">
                <p class="card-text">Some example text.</p>
                <a href="#" class="btn btn-primary">New post</a>
            </div>
        </div>
    </div>
    
    <div class="row my-row" style="padding-bottom:20px">
        <div class="jumbotron flex-fill card shadow-lg" style="width:400px;border-radius: 5%">
            @if ($profile->description)
                <h4>Description: 
                    @if ($authorized)
                    <a href="#" style="color:black">
                        <small class="ml-5" style="font-size: 13px"> make a change </small>
                        <i class="fas fa-edit" style="font-size:25px"></i>
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
                    <a href="#" style="color:black">
                        <i class="fas fa-edit fa-lg " style="font-size:25px"></i>
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
@endsection

@section('footer', 'footer')