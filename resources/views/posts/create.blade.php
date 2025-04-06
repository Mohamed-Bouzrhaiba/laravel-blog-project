<x-master title="create post">
    @foreach ($errors->all() as $error )
    <x-alert type="danger">
  <li>{{$error}}</li>
    </x-alert>
    @endforeach
    <form action="{{route("posts.store")}}" method="post" enctype="multipart/form-data">
        @csrf
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">title *</label>
        <input type="text" name="title" class="form-control" id="exampleFormControlInput1" >
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">content *</label>
        <textarea class="form-control" name="body" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>
      <div class="mb-3">
        <label for="formFile" class="form-label">image</label>
        <input class="form-control" name="image" type="file" id="formFile">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Tags </label>
        <input type="text" name="tags" class="form-control" id="exampleFormControlInput1" >
      </div>

      <button class="btn btn-primary" type="submit"> Add post</button>
    </form>
</x-master>
