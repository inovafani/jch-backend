@extends('admin.layout')

@section('title', 'Edit Post')

@section('content')
<h2>Edit Post</h2>

<form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
  @csrf
  @method('PUT')

  <div class="mb-3">
    <label class="form-label">Title</label>
    <input name="title" class="form-control" value="{{ old('title', $post->title) }}" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Excerpt</label>
    <input name="excerpt" class="form-control" value="{{ old('excerpt', $post->excerpt) }}">
  </div>

  <div class="mb-3">
    <label class="form-label">Content</label>
    <textarea id="content" name="content" class="form-control" rows="10" required>{{ old('content', $post->content) }}</textarea>
  </div>

  <div class="mb-3">
    <label class="form-label">Status</label>
    <select name="status" class="form-select">
      <option value="draft" {{ old('status', $post->status) == 'draft' ? 'selected' : '' }}>Draft</option>
      <option value="published" {{ old('status', $post->status) == 'published' ? 'selected' : '' }}>Published</option>
    </select>
  </div>

  <button class="btn btn-primary">Update</button>
  <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection

@push('scripts')
<!-- TinyMCE CDN -->
<script src="https://cdn.tiny.cloud/1/3adx6p5aiduavum0xi04332hs10m9idtezhcovcpu5jhxauf/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: '#content',
    height: 400,
    menubar: false,
    plugins: 'link image code lists',
    toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright | bullist numlist | link image | code'
  });
</script>
@endpush