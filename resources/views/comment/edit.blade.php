<x-master title="edit comment">
    <form action="{{route("comment.update",$comment->id)}}" method="post">
        @method("PUT")
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Comment</label>
            <input type="text" name="comment" class="form-control" id="comment" value="{{$comment->comment}}" >
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
</x-master>
