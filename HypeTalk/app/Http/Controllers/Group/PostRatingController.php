<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use App\Models\Post;
use Illuminate\Http\Request;

class PostRatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        $data = request();

        $rating = Rating::where('user_id', '=', Auth()->user()->id)->where('post_id', '=', $post->id)->first();
        if($rating === null)
        {
            $postRating = new Rating([
                'value' => $data->value,
            ]);
            $postRating->user()->associate(Auth()->user());
            $postRating->post()->associate($post->id);
            $postRating->save();
        }
        $rating->update(array('value' => $data->value));
        return $post->ratings()->sum('value');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PostRating  $postRating
     * @return \Illuminate\Http\Response
     */
    public function show(PostRating $postRating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PostRating  $postRating
     * @return \Illuminate\Http\Response
     */
    public function edit(PostRating $postRating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PostRating  $postRating
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PostRating  $postRating
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostRating $postRating)
    {
        //
    }
}