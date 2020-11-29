<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Group;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth()->check())
        {
            $posts = Post::orderByDesc('rating')->get();
            $groups = Group::All();
        }
        else
        {
            $posts = Post::orderByDesc('rating')->get();
            $groups = Group::where('visibility', '=', '0')->get();
        }
        return view('home')->with([
            'posts' => $posts,
            'groups' => $groups
        ]);
    }
}
