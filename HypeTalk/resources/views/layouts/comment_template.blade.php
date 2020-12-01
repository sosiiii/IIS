<div class="d-flex flex-column">
    <div class="ml-1">
        <div class="d-flex flex-column">
            <div class="mt-2">
                <div class="d-flex flex-row">
                    <div class="mb-2 mr-auto">{{$comment->title}}</div>
                    <div class="mb-2">
                        @can('delete',$comment)
                        <form method="POST" action="{{route('group.comment.destroy', [$post->group, $post, $comment])}}">
                            @csrf
                            {{method_field('DELETE')}}
                            <div class=""><button type="submit" class="btn p-0"><i class="fas fa-times fa-lg"></i></button></div>
                        </form>
                        @endcan
                    </div>
                </div>
            </div>
            <div class="d-flex flex-row">
                <up-down-vote-comment comment-id="{{$comment->id}}" comment-rating="{{$comment->commentratings->sum('value')}}"></up-down-vote-comment>
            </div>
        </div>
    </div>
</div>
