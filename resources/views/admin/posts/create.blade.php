@extends('admin.layout')

@section('title', 'Create Post')

@section('content')
<h2>Create Post</h2>

<form action="{{ route('admin.posts.store') }}" method="POST">
  @csrf
  <div class="mb-3">
    <label class="form-label">Title</label>
    <input name="title" class="form-control" value="{{ old('title') }}" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Excerpt</label>
    <input name="excerpt" class="form-control" value="{{ old('excerpt') }}">
  </div>

  <div class="mb-3">
    <label class="form-label">Content</label>
    <textarea id="content" name="content" class="form-control" rows="10">{{ old('content') }}</textarea>
  </div>

  <div class="mb-3">
    <label class="form-label">Status</label>
    <select name="status" class="form-select">
      <option value="draft">Draft</option>
      <option value="published">Published</option>
    </select>
  </div>

  <button type="submit" class="btn btn-success">Save</button>
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