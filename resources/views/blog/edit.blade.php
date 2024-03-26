@extends('layouts.master')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h1>Edit Blog Post</h1>
                <a href="{{ route('blog.index') }}" class="btn btn-sm btn-primary">Blog List</a>
            </div>
        </div>
    </div>
    <form action="{{ route('blog.update', $blogPost) }}" method="POST">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="title" class="form-label">Title *</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="title" value="{{ $blogPost->title }}" />
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Content *</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ $blogPost->description?? '' }}</textarea>
        </div>
        <button type="submit" class="btn btn-info btn-sm">Save</button>
    </form>
</div>
@endsection
