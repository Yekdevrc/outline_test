@extends('layouts.master')

@section('content')
<div class="container">
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <h1>Blog List</h1>
            <a href="{{ route('blog.create') }}" class="btn btn-sm btn-primary">Add New</a>
        </div>
    </div>
</div>
<table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Content</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($blogPosts as $blogPost)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $blogPost->title }}</td>
            <td>{{ $blogPost->description }}</td>
            <td class="d-flex">
                <a href="{{ route('blog.edit', $blogPost) }}" class="btn btn-sm btn-info mr-2">Edit</a>
                <div class="d-flex">
                    <a href="{{ route('blog.show', $blogPost) }}" class="btn btn-sm btn-primary">Show</a>
                <form action="{{ route('blog.destroy', $blogPost) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>

            </div>
            </td>
          </tr>
        @empty
          <td class="text-center" colspan="5">No Data Found</td>
        @endforelse

    </tbody>
  </table>
</div>
  @endsection
