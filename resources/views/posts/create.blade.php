@extends('layouts.app')

@section('content')
<div class="card card-default">
    <div class="card-header">

    </div>
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="list-group">
                @foreach ($errors->all() as $error)
                    <li class="list-group-item text-danger">
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>

        @endif
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="30" rows="4" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" cols="30" rows="6" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="published_at">Published_at</label>
                <input type="text" name="published_at" id="published_at" class="form-control" value="">
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success"> Add Post</button>
            </div>
        </form>
    </div>
</div>
@endsection
