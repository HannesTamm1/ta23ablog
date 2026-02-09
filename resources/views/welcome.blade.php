@extends('partials.layout')
@section('title', 'Home')
@section('content')
        @isset($tag)
            <h1 class="text-2xl font-semibold mb-3">Posts tagged “{{ $tag->name }}”</h1>
        @endisset

        {{ $posts->links() }}
        <div class="grid grid-cols-4 gap-2">
            @foreach ($posts as $post)
                 @include('partials.post-card')
            @endforeach
        </div>

@endsection
