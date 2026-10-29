<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $post->title }} | Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <header class="bg-white border-bottom">
        <div class="container py-4">
            <a href="{{ route('posts.index') }}" class="text-decoration-none text-secondary small">&larr; Back to all posts</a>
            <p class="text-primary text-uppercase fw-semibold small mt-3 mb-1">The Blog</p>
        </div>
    </header>

    <main class="container py-5">
        <article class="card border-0 shadow-sm mx-auto" style="max-width: 860px;">
            <div class="card-body p-4 p-md-5">
                <h1 class="display-6 fw-bold mb-4">{{ $post->title }}</h1>
                <div class="text-secondary fs-5" style="white-space: pre-line;">{{ $post->body }}</div>

                <div class="d-flex flex-wrap gap-2 pt-4 mt-4 border-top">
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit post</a>
                    <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary">All posts</a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="ms-sm-auto">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">Delete post</button>
                    </form>
                </div>
            </div>
        </article>
    </main>
</body>
</html>
