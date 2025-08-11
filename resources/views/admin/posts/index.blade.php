@extends('admin.layout')

@section('title', 'Posts')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Posts</h2>
    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">+ New Post</a>
</div>

<table class="table table-striped">
  <thead>
    <tr><th>ID</th><th>Title</th><th>Status</th><th>Created</th><th>Actions</th></tr>
  </thead>
  <tbody>
    @forelse($posts as $post)
      <tr>
        <td>{{ $post->id }}</td>
        <td>{{ $post->title }}</td>
        <td>{{ $post->status }}</td>
        <td>{{ $post->created_at->format('Y-m-d') }}</td>
        <td>
          <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-sm btn-info">View</a>
          <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-sm btn-warning">Edit</a>
          <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete post?')">Delete</button>
          </form>
        </td>
      </tr>
    @empty
      <tr><td colspan="5">No posts yet.</td></tr>
    @endforelse
  </tbody>
</table>

{{ $posts->links() }}
@endsection