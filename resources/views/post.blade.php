@extends('partials.layout')
@section('title', $post->title)
@section('content')
    @include('partials.post-card', ['full' => true])

    <div id="comments"></div>

    @auth
        <form class="my-4" method="POST" action="{{ route('comment.store', $post) }}">
            @csrf
            <textarea
                name="body"
                rows="3"
                placeholder="Leave a comment"
                class="textarea textarea-bordered w-full"
                required
            >{{ old('body') }}</textarea>
            @error('body')
                <p class="text-error mt-1 text-sm">{{ $message }}</p>
            @enderror
            <button class="btn btn-primary mt-2">Post comment</button>
        </form>
    @endauth

    @foreach ($post->comments as $comment)
        <div class="card bg-base-300 shadow-sm my-2">
            <div class="card-body">
                <p>{{ $comment->body }}</p>
                <p class="text-base-content/50">{{ $comment->user->name }}</p>
            </div>
        </div>
    @endforeach
@endsection
