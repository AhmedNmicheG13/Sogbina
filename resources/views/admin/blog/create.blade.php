@extends('admin.dashboard')

@section('content')
<div class="container">
    <h1>Create Blog</h1>
    <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <!-- Title Field -->
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Content Field -->
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" id="content" name="content" rows="10" required>{{ old('content') }}</textarea>
            @error('content')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Short Content Field -->
        <div class="form-group">
            <label for="short_content">Short Content</label>
            <textarea class="form-control" id="short_content" name="short_content" rows="3" required>{{ old('short_content') }}</textarea>
            @error('short_content')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Image Field -->
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control-file" id="image" name="image">
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Show Comments Field -->
        <div class="form-group">
            <label for="show_comments">Show Comments</label>
            <select class="form-control" id="show_comments" name="show_comments" required>
                <option value="1" {{ old('show_comments') == 1 ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ old('show_comments') == 0 ? 'selected' : '' }}>No</option>
            </select>
            @error('show_comments')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Category Field -->
        <div class="form-group">
            <label for="category">Category</label>
            <input type="text" class="form-control" id="category" name="category" value="{{ old('category') }}" required>
            @error('category')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- SEO Title Field -->
        <div class="form-group">
            <label for="seo_title">SEO Title</label>
            <input type="text" class="form-control" id="seo_title" name="seo_title" value="{{ old('seo_title') }}">
            @error('seo_title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Meta Description Field -->
        <div class="form-group">
            <label for="meta_description">Meta Description</label>
            <textarea class="form-control" id="meta_description" name="meta_description" rows="3">{{ old('meta_description') }}</textarea>
            @error('meta_description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Tags Field -->
        <div class="form-group">
            <label for="tags">Tags</label>
            <input type="text" class="form-control" id="tags" name="tags" value="{{ old('tags') }}">
            @error('tags')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Slug Field -->
        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') }}" required>
            @error('slug')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
