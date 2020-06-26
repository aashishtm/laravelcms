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

            <tr>
                <td>

                </td>
                <td>

                </td>
            </tr>

        </tbody>
    </table>
</div>
@endsection
