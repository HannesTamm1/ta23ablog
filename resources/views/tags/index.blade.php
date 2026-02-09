@extends('partials.layout')
@section('title', 'Tags')
@section('content')
<div class="flex items-center gap-2 mb-3">
    <a href="{{ route('tags.create') }}" class="btn btn-primary">New Tag</a>
</div>

{{ $tags->links() }}
<div class="bg-base-100 border border-base-content/5 rounded-box">
    <table class="table table-zebra">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tags as $tag)
                <tr class="hover:bg-base-300">
                    <td>{{ $tag->id }}</td>
                    <td>{{ $tag->name }}</td>
                    <td>{{ $tag->created_at }}</td>
                    <td>{{ $tag->updated_at }}</td>
                    <td>
                        <div class="join">
                            <a href="{{ route('tags.edit', $tag) }}" class="btn btn-warning join-item">Edit</a>
                            <form action="{{ route('tags.destroy', $tag)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-error join-item">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Actions</th>
            </tr>
        </tfoot>
    </table>
</div>
{{ $tags->links() }}
@endsection
