@extends('admin.layout')

@section('title', 'Post Details')

@section('content')
<h2>{{ $post->title }}</h2>
<p><small>By: {{ $post->user?->name }} | {{ $post->created_at->format('Y-m-d H:i') }}</small></p>

<div class="mb-4">
  {!! $post->content !!}
</div>

<a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Back</a>
<a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>
@endsection