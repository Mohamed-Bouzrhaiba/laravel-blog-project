<x-master title="login">
    <div class="container h-100 d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="col-md-6">
            <div class="text-center mb-4">
                <img src="https://laravel.com/img/logomark.min.svg" alt="Logo" class="img-fluid" style="max-width: 150px;">
            </div>
    @foreach ($errors->all() as $error )
    <x-alert type="danger">
  <li>{{$error}}</li>
    </x-alert>
    @endforeach
<form action="{{route("login")}}" method="post" class="bg-light p-4 rounded shadow-sm">
    @csrf

    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" id="exampleFormControlInput1" >
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">password</label>
        <input type="password" name="password" class="form-control" id="exampleFormControlInput1" >
      </div>

      <button class="btn btn-primary">Login  </button>
</form>
        </div>
    </div>
</x-master>
