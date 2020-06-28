@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end">
    <a href="{{ route('posts.create') }}" class="btn btn-primary">Add Post</a>
</div>
<div class="card card-default">
    <div class="card-header">Posts</div>
    <table class="table card-body">
        <thead>
            <th></th>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <td>
                    <img src="{{ asset($post->image) }}" width="120px" height="120px" alt="">
                </td>
                <td>
                    {{ $post->title }}
                </td>
                <td>
                    {{ $post->description }}
                </td>
                <td>
                    {{ $post->content }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
