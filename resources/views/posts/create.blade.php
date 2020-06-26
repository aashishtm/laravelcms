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
        <form action="" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" id="description" class="form-control" value="">
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success"> Add Post</button>
            </div>
        </form>
    </div>
</div>
@endsection
