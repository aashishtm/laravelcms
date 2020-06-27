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
                    {{ $post->title }}
                </td>
                <td>
                    {{ $post->description }}
                </td>
                <td>
                    {{ $post->content }}
                </td>
                <td>
                   <img src="{{ $post->image }}" alt="" class="img-fluid">
                </td>

                <td>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
