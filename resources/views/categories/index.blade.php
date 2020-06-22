@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end">
    <a href="{{ route('categories.create') }}" class="btn btn-primary">Add Category</a>
</div>
<div class="card card-default">
    <div class="card-header">Categories</div>
    <table class="table card-body">
        <thead>
            <th>Name</th>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>
                    {{ $category->name }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
