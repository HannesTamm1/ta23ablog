@extends('partials.layout')
@section('title', 'Edit Tag')
@section('content')
<form action="{{ route('tags.update', $tag) }}" method="POST" class="max-w-md space-y-3">
    @csrf
    @method('PUT')
    <div class="form-control">
        <label class="label">
            <span class="label-text">Name</span>
        </label>
        <input type="text" name="name" value="{{ old('name', $tag->name) }}" class="input input-bordered" required>
        @error('name')
            <p class="text-error text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
    <button class="btn btn-primary">Save</button>
</form>
@endsection
