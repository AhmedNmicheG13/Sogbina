@extends('admin.dashboard')

@section('content')
<div class="container">
    <h1>Edit Blog</h1>
    <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $blog->title) }}" required>
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" id="content" name="content" rows="10" required>{{ old('content', $blog->content) }}</textarea>
        </div>
        
        <div class="form-group">
            <label for="short_content">Short Content</label>
            <textarea class="form-control" id="short_content" name="short_content" rows="3" required>{{ old('short_content', $blog->short_content) }}</textarea>
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            @if($blog->image)
                <div>
                    <img src="{{ asset('images/' . $blog->image) }}" alt="Blog Image" style="max-width: 200px;">
                </div>
            @endif
            <input type="file" class="form-control" id="image" name="image">
        </div>

        <div class="form-group">
            <label for="show_comments">Show Comments</label>
            <select class="form-control" id="show_comments" name="show_comments" required>
                <option value="1" {{ old('show_comments', $blog->show_comments) == 1 ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ old('show_comments', $blog->show_comments) == 0 ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <div class="form-group">
            <label for="category">Category</label>
            <input type="text" class="form-control" id="category" name="category" value="{{ old('category', $blog->category) }}" required>
        </div>

        <div class="form-group">
            <label for="seo_title">SEO Title</label>
            <input type="text" class="form-control" id="seo_title" name="seo_title" value="{{ old('seo_title', $blog->seo_title) }}">
        </div>

        <div class="form-group">
            <label for="meta_description">Meta Description</label>
            <textarea class="form-control" id="meta_description" name="meta_description" rows="3">{{ old('meta_description', $blog->meta_description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="tags">Tags</label>
            <input type="text" class="form-control" id="tags" name="tags" value="{{ old('tags', $blog->tags) }}">
        </div>

        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug', $blog->slug) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
