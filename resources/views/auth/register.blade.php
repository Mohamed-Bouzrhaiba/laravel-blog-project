<x-master title="Create Account">
    <div class="container h-100 d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="col-md-6">
            <div class="text-center mb-4">
                <img src="https://laravel.com/img/logomark.min.svg" alt="Logo" class="img-fluid" style="max-width: 150px;">
            </div>

            @foreach ($errors->all() as $error)
                <x-alert type="danger">
                    <li>{{ $error }}</li>
                </x-alert>
            @endforeach

            <form action="{{ route('register') }}" method="post" class="bg-light p-4 rounded shadow-sm">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name" >
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" >
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" >
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Password Confirmation</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                </div>
                <button class="btn btn-primary w-100">Create Account</button>
            </form>
        </div>
    </div>
</x-master>
