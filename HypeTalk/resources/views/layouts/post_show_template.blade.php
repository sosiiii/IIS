@can('view',$post)
<div class="d-flex flex-column shadow-sm" style="background-color: #ebebeb;">
    <div class="d-flex flex-row mb-3">
        <div class="p-1">
            <div class="d-flex flex-column" >
                <up-down-vote-post post-id="{{$post->id}}" post-rating="{{$post->rating}}"></up-down-vote-post>
            </div>
        </div>
        <div class="mx-3 flex-grow-1">
            <div class="d-flex flex-column">
                <div class="mr-auto mt-1" style="cursor: pointer;" onclick="location.href='{{route('group.show', $post->group)}}';">{{$post->group->name}}</div>
                <div class="mb-2"><h3>{{$post->title}}</h3></div>
                <div class="mb-3">{{$post->description}}</div>
                <div class="mb-4" style="cursor: pointer;" onclick="location.href='{{route('profile.show', $post->user)}}';">{{$post->user->name}}</div>
                @guest

                @else
                    @if(Auth()->user()->isMember($post->group->name))
                        <div class="mb-4">
                            <form method="POST" action="{{route('group.comment.store', [$post->group, $post])}}">
                                @csrf
                                <textarea  name="comment" class="form-control z-depth-1" style="overflow:auto;resize:none" rows="4" cols="5" placeholder="Your comment..."></textarea>
                               <button type="submit" class="form-control btn btn btn-primary p-0">comment</button>
                            </form>
                        </div>
                    @endif
                @endguest
                <div class="p-1">
                    <div class="row">
                        <div class="col"><hr></div>
                        <div class="col-auto">Comments</div>
                        <div class="col"><hr></div>
                    </div>
                </div>
                <div class="p-1">
                    @foreach ($post->comments as $comment)
                        @include('layouts.comment_template', $comment)
                    @endforeach
                </div>
            </div>
        </div>
        <div class="p-1" style="visibility: hidden;">
            <div class="d-flex flex-column" >
                <button class="btn p-0"><i class="fas fa-arrow-up fa-lg"></i></button>
                <button class="btn p-0">{{$post->rating}}</button>
                <button class="btn p-0"><i class="fas fas fa-arrow-down fa-lg"></i></button>
            </div>
        </div>
    </div>
</div>
@endcan
