@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end">
    <a href="{{ route('posts.create') }}" class="btn btn-primary">Add Post</a>
</div>
<div class="card card-default">
    <div class="card-header">Posts</div>
    @if ($posts->count()>0)
    <table class="table card-body text-center">
        <thead>
            <th>Image</th>
            <th>Title</th>
            <th>Description</th>
            <th>Category</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <td>
                    <img src="{{ asset('storage/'.$post->image) }}" width="60px" height="60px" alt="">
                </td>
                <td>
                    {{ $post->title }}
                </td>
                <td>
                    {{ $post->description }}
                </td>
                <td>
                    {{ $post->category->name}}
                </td>
                <td class="btn-group">
                    @if (!$post->trashed())
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    @else
                    <form action="{{ route('restore-post', $post->id) }}" method="post">
                        @csrf
                        @method('put')
                        <button type='submit' class="btn btn-primary btn-sm">Restore</button>
                    </form>
                    @endif
                <form action="{{ route ('posts.destroy', $post->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">
                        {{ $post->trashed() ? 'Delete' : 'Trash' }}
                    </button>
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @else
        <h3 class="text-center">No Post Yet...</h3>
    @endif
</div>
@endsection
