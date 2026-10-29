<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <header class="bg-white border-bottom">
        <div class="container py-4 d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3">
            <div>
                <p class="text-primary text-uppercase fw-semibold small mb-1">The Blog</p>
                <h1 class="h2 mb-0">Latest posts</h1>
            </div>
            <a href="{{ route('posts.create') }}" class="btn btn-primary px-4">Create a post</a>
        </div>
    </header>

    <main class="container py-5">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @forelse ($posts as $post)
            <article class="card border-0 shadow-sm mb-4">
                <div class="card-body p-4 p-md-5">
                    <h2 class="h3 card-title mb-3">{{ $post->title }}</h2>
                    <p class="card-text text-secondary mb-4" style="white-space: pre-line;">{{ $post->body }}</p>

                    <div class="d-flex flex-wrap align-items-center gap-2 pt-3 border-top">
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-outline-primary btn-sm">Read post</a>
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-outline-secondary btn-sm">Edit</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="ms-sm-auto">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
            </article>
        @empty
            <div class="card border-0 shadow-sm text-center">
                <div class="card-body py-5">
                    <h2 class="h4">No posts yet</h2>
                    <p class="text-secondary mb-4">Start sharing your thoughts with your first post.</p>
                    <a href="{{ route('posts.create') }}" class="btn btn-primary">Create your first post</a>
                </div>
            </div>
        @endforelse
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
