<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit post | {{ $post->title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <header class="bg-white border-bottom">
        <div class="container py-4">
            <a href="{{ route('posts.show', $post->id) }}" class="text-decoration-none text-secondary small">&larr; Back to post</a>
            <h1 class="h2 mt-2 mb-0">Edit post</h1>
        </div>
    </header>

    <main class="container py-5">
        <div class="card border-0 shadow-sm mx-auto" style="max-width: 760px;">
            <div class="card-body p-4 p-md-5">
                <p class="text-secondary mb-4">Make changes to your post below.</p>

                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <p class="fw-semibold mb-2">Please check the following:</p>
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('posts.update', $post->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="title" class="form-label fw-semibold">Title</label>
                        <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}" class="form-control @error('title') is-invalid @enderror" required autofocus>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="body" class="form-label fw-semibold">Body</label>
                        <textarea id="body" name="body" rows="9" class="form-control @error('body') is-invalid @enderror" required>{{ old('body', $post->body) }}</textarea>
                        @error('body')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex flex-wrap gap-2">
                        <button type="submit" class="btn btn-primary px-4">Save changes</button>
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>
