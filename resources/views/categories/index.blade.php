@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end">
    <a href="{{ route('categories.create') }}" class="btn btn-primary">Add Category</a>
</div>
<div class="card card-default">
    <div class="card-header">Categories</div>
    <table class="table card-body text-center">
        <thead>
            <th>Name</th>
            <th>Posts</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>
                    {{ $category->name }}
                </td>
                <td>
                    {{ $category->posts->count() }}
                </td>
                <td>
                    <a href="{{ route('categories.edit',$category->id) }}" class="btn btn-primary btn-sm float-right">Edit</a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger btn-sm float-right" onclick="handleDelete({{ $category->id }})">
                        Delete
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


  <!-- Modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLebel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" id='deleteCategoryForm'>
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete Category?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                Do you want to delete?
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="sumbit" class="btn btn-danger">Yes</button>
                </div>
            </div>
        </form>
    </div>
  </div>
</div>
@endsection

@section('script')
<script>
    function handleDelete(id){
        var form = document.getElementById('deleteCategoryForm')
        form.action = '/categories/'+id
        $('#deleteModal').modal('show')
    }
</script>
@endsection
