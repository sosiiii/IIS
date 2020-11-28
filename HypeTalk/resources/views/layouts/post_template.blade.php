<div>
    <div class="d-flex flex-column shadow-sm mb-3" style="background-color: #ebebeb;">
        <div class="d-flex flex-row">
            <div class="p-1" style="background-color: #e0e0e0 !important;">
                <div class="d-flex flex-column" >
                    <up-down-vote-post post-id="{{$post->id}}" post-rating="{{$post->rating}}"></up-down-vote-post>
                </div>
            </div>
            <div class="mx-3">
                <div class="d-flex flex-column">
                    <div class="mt-1" style="cursor: pointer;" onclick="location.href='{{route('group.show', $post->group)}}';">{{$post->group->name}}</div>
                    <div class="d-flex flex-column" style="cursor: pointer;" onclick="location.href='{{route('group.posts.show', [$post->group, $post])}}';">
                        <div class="mb-2"><h3>{{$post->title}}</h3></div>
                        <div class="mb-2">{{$post->description}}</div>
                        <div class="mb-1" style="cursor: pointer;" onclick="location.href='{{route('profile.show', $post->user)}}';">{{$post->user->name}}</div>
                    </div>
                </div>
            </div>
            <div class="p-1" style="visibility: hidden;">
                <div class="d-flex flex-column" >
                    <up-down-vote-post></up-down-vote-post>
                </div>
            </div>
        </div>
    </div>
</div>
