@extends('Layout/isUser')

@section('content')
    <div class="container">
        <h2>Edit Article</h2>
        <form method="POST" action="{{ route('article_update_action', $article->id) }}">
            @csrf
            @method('PUT') {{-- Gunakan metode PUT untuk pembaruan --}}

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $article->title }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="4" required>{{ $article->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="tag">Tag:</label>
                <input type="text" class="form-control" id="tag" name="tag" value="{{ $article->tag }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Article</button>
        </form>
    </div>
@endsection