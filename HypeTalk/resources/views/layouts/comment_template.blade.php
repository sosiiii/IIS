<div class="d-flex flex-column">
    <div class="ml-1">
        <div class="d-flex flex-column">
            <div class="mt-2">{{$comment->user->name}}</div>
            <div class="mb-2">{{$comment->title}}</div>
            <div class="d-flex flex-row">
                <up-down-vote-comment comment-id="{{$comment->id}}" comment-rating="{{$comment->commentratings->sum('value')}}"></up-down-vote-comment>
            </div>
        </div>
    </div>
</div>
