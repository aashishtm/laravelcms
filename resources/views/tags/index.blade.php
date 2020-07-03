@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end">
    <a href="{{ route('tags.create') }}" class="btn btn-primary">Add tag</a>
</div>
<div class="card card-default">
    <div class="card-header">tags</div>
    @if ($tags->count()>0)
    <table class="table card-body text-center">
        <thead>
            <th>Name</th>
            <th>Posts</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($tags as $tag)
            <tr>
                <td>
                    {{ $tag->name }}
                </td>
                <td>
                    0
                </td>
                <td>
                    <a href="{{ route('tags.edit',$tag->id) }}" class="btn btn-primary btn-sm float-right">Edit</a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger btn-sm float-right" onclick="handleDelete({{ $tag->id }})">
                        Delete
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <h3 class="text-center">No tag Yet...</h3>
    @endif

  <!-- Modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLebel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" id='deletetagForm'>
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete tag?</h5>
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
        var form = document.getElementById('deletetagForm')
        form.action = '/tags/'+id
        $('#deleteModal').modal('show')
    }
</script>
@endsection
