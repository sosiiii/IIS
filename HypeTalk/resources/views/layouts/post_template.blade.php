<div class="card-body">
    <div class="container- mb-3 shadow-lg">

        <div class="row">
            <div class="col-md-auto rounded-left p-1" style="background-color:#e0e0e0;">
                <button class="btn p-0"><i class="fas fa-arrow-up fa-lg"></i></button>
                <p>
                    <button class="btn p-0">
                        <i class="fas fas fa-arrow-down fa-lg"></i>
                    </button>
                </p>
            </div>

            <div onclick="location.href='###TODO';" style="cursor:pointer;"
                class="col col-xs-11 border rounded-right">
                <span class="d-block mb-1">
                    {{ $post_group }}
                </span>


                <h3 class="mb-3">
                    {{ $post_header }}
                </h3>
                <p>
                    {{ $post_body }}

                </p>

                <a href="#TODO" class="btn p-0">
                    <i class="fas fa-comment-alt fa-1x">
                        <span class="pl-1" style="font-family:Nunito">comments</span>
                    </i>
                </a>
            </div>
        </div>
    </div>
</div>