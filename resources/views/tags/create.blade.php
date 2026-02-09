@extends('partials.layout')
@section('title', 'New Tag')
@section('content')
<form action="{{ route('tags.store') }}" method="POST" class="max-w-md space-y-3">
    @csrf
    <div class="form-control">
        <label class="label">
            <span class="label-text">Name</span>
        </label>
        <input type="text" name="name" value="{{ old('name') }}" class="input input-bordered" required>
        @error('name')
            <p class="text-error text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
    <button class="btn btn-primary">Create</button>
</form>
@endsection
