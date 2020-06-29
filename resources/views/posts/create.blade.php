@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection

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
        <form action="{{ isset($post) ? route('posts.update',$post->id) : route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if (isset($post))
                @method('PUT')
            @endif
            <div class="form-group">
                <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ isset($post) ? $post->title : '' }}">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="30" rows="4" class="form-control">{{ isset($post) ? $post->description : '' }}</textarea>
            </div>

            <div class="form-group">
                <label for="memo">Content</label>
                <input id="memo" type="hidden" name="memo" value="{{ isset($post) ? $post->memo : '' }}">
                <trix-editor input="memo"></trix-editor>
            </div>

            <div class="form-group">
                <label for="published_at">Published_at</label>
                <input type="text" name="published_at" id="published_at" class="form-control" value="{{ isset($post) ? $post->published_at : '' }}">
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                @if (isset($post))
                    <img src="{{ asset('storage/'.$post->image)}}" alt="" class="img-fluid">

                @endif
                <input type="file" name="image" id="image" class="form-control">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success"> Add Post</button>
            </div>
        </form>
    </div>
</div>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr('#published_at',{
            enableTime: true
        })
    </script>
@endsection
