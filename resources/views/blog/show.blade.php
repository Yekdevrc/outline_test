@extends('layouts.master')

@section('content')
<div class="container">
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <h1>show Blog Post</h1>
            <a href="{{ route('blog.index') }}" class="btn btn-sm btn-primary">Blog List</a>
        </div>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <label for="title" class="form-label">Title *</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="title" value="{{ $blogPost->title }}" disabled />
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Content *</label>
            <textarea class="form-control" id="description" name="description" rows="3" disabled>{{ $blogPost->description?? '' }}</textarea>
        </div>

        <form action="{{ route('comments.store') }}" method="POST">
            @csrf
            <input type="hidden" name="blog_post_id" value="{{ $blogPost->id }}">
            <textarea class="form-control mb-2" id="comments" name="comments" rows="3" placeholder="Comment here..."></textarea>
            <button type="submit" class="btn btn-info btn-sm">Save</button>
        </form>

        @if(count($comments) > 0)
        <label for="comments" class="form-label">Comments</label>
        <table class="table table-hover">
           <tr>
               <th>comments</th>
               <th>Action</th>
           </tr>
           @foreach ($comments as $comment)
           <tr>
               <td><input type="text" name="comments" value="{{ $comment->comments }}" id="InputField" disabled></td>
               <td class="d-flex">
                    <form action="" method="POST">
                        @csrf
                        @method('put')
                        <a class="btn btn-info btn-sm" id="editBlog">edit</a>
                    </form>
                   <form action="{{ route('comments.destroy', $comment) }}" method="POST">
                       @csrf
                       @method('delete')
                       <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                   </form>
               </td>
           </tr>
       @endforeach
       <p id="user">No. of User Active on this post: </p>
        </table>
   @endif
    </div>
</div>

  @endsection

  @push('scripts')
  <script>
    $(document).ready(function(){
        $('#editBlog').on('click', function (){
            console.log('hello')
            const edit=$('#editBlog')
            const input=$('#InputField').removeAttr('disabled')
        })
    })


    //websocket
    Echo.channel(`users`)
            .listen('users', (e) => {
                document.getElementById('#user').innerHTML = e.users.length
            });
</script>
  @endpush
