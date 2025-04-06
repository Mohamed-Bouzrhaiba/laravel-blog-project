<x-master title="edit post">
    @foreach ($errors->all() as $error )
    <x-alert type="danger">
  <li>{{$error}}</li>
    </x-alert>
    @endforeach
    <form action="{{route("posts.update",$post->id)}}" method="post" enctype="multipart/form-data">
        @method("PUT")
        @csrf
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">title *</label>
        <input type="text" name="title" class="form-control" value="{{$post->title}}" id="exampleFormControlInput1" >
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">content *</label>
        <textarea class="form-control" name="body"  id="exampleFormControlTextarea1" rows="3">{{$post->body}}</textarea>
      </div>
      <div class="mb-3">
        <label for="formFile" class="form-label">image</label>
        <input class="form-control" name="image" type="file" id="formFile">
        <img src="{{asset('storage/'.$post->image)}}" width="100px" height="100px" alt="" srcset="">
      </div>

      <label for="formFile" class="form-label">Tags</label>
      <input class="form-control" type="text"  name="tags" id="tags" value="{{ old('tags', $tags) }}" placeholder="Comma-separated tags">

      <button class="btn btn-primary" type="submit"> Update post</button>
    </form>
</x-master>
