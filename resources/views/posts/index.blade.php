<x-master title="All Posts">
    <h1 class="mb-4">POSTS:</h1>
    @auth
    <a class="btn btn-primary mb-4" href="{{ route('posts.create') }}">+ Add New Post</a>

    @endauth

    <div class="row">
        @foreach ($posts as $post)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="Post Image" style="height: 200px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ \Illuminate\Support\Str::limit($post->body, 100) }}</p>
                    <h6>by: {{ $post->user->name }}</h6>
                    <div class="mt-auto">
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Read</a>
                        @can('update', $post)
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Modify</a>
                        @endcan
                        @can('delete', $post)
                            <form action="{{ route('posts.destroy', $post->id) }}" method="post" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button onclick="return confirm('Do you want to delete this post?')" class="btn btn-danger">Delete</button>
                            </form>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination links -->
    <div class="d-flex justify-content-center mt-4">
        {{ $posts->links() }}
    </div>
</x-master>
