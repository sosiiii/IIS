<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Models\CommentRating;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentRatingController extends Controller
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
    public function store(Request $request, Comment $comment)
    {
        if(!Auth()->check() || !Auth()->user()->isMember($comment->post->group->name))
        {
            return $comment->commentratings()->sum('value');
        }
        $data = request();
        $commentRating = CommentRating::where('user_id', '=', Auth()->user()->id)->where('comment_id', '=', $comment->id)->first();
        if($commentRating === null)
        {
            $commentRating = new CommentRating([
                'value' => $data->value,
            ]);
            $commentRating->user()->associate(Auth()->user());
            $commentRating->comment()->associate($comment->id);
            $commentRating->save();
        }
        $commentRating->update(array('value' => $data->value));
        return $comment->commentratings()->sum('value');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CommentRating  $commentRating
     * @return \Illuminate\Http\Response
     */
    public function show(CommentRating $commentRating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CommentRating  $commentRating
     * @return \Illuminate\Http\Response
     */
    public function edit(CommentRating $commentRating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CommentRating  $commentRating
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CommentRating $commentRating)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CommentRating  $commentRating
     * @return \Illuminate\Http\Response
     */
    public function destroy(CommentRating $commentRating)
    {
        //
    }
}
