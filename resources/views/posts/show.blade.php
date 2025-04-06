<x-master title="Show Post">
    <div class="container my-5">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid rounded mb-4" alt="{{ $post->title }}">
                <h2 class="mb-3">{{ $post->title }}</h2>
                <h5 class="text-muted mb-4">By {{ $post->user->name }}</h5>
                <p class="lead">{{ $post->body }}</p>
                <h4>Tags:</h3>
                <ul style="list-style-type:square;">
                    @foreach ($post->tags as $tag)
                        <li>{{ $tag->name }}</li>
                    @endforeach
                </ul>
                <div>
                    <h3>Comments:</h3>
                    @if (auth()->check())
                    <form action="{{route("comment.store")}}" method="post">
                        @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Write a Comment</label>
                        <input type="hidden" name="post_id" value="{{$post->id}}">
                        <textarea name="comment" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        <button class="btn btn-primary mt-2">Add Comment</button>
                    </div>
                </form>
                @else
               <p>Please  <a href="{{route("login.form")}}">login</a> or <a href="{{route("form.register")}}">register</a> to comment </p>

                    @endif


                    @foreach ($post->comments as $comment )
                    <figure>
                        <blockquote class="blockquote">
                          <p>{{$comment->comment}}</p>
                        </blockquote>
                        <figcaption class="blockquote-footer">
                         by : {{$comment->user->name}}
                        <div>
                            @can("update",$comment)
                             <a href="{{route("comment.edit",$comment->id)}}" class="btn btn-warning">Edit</a>
                             @endcan
                        @can("delete",$comment)
                         <form action="{{route("comment.destroy",$comment->id)}}">
                            @method("delete")
                            @csrf
                            <button onclick="return confirm('do you really wants to delete this comment')" class="btn btn-danger">Delete</button>
                        </form>
                        @endcan
                    </div>
                        </figcaption>
                      </figure>
                    @endforeach

                </div>
                <a href="{{ route('posts.index') }}" class="btn btn-secondary mt-4">Back to Posts</a>
            </div>
        </div>
    </div>
</x-master>
