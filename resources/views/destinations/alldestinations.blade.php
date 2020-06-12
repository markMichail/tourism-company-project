@extends('layouts.app')
@section('content')

<!-- Editable table -->
<div class="card">
  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">All Destinations table</h3>
  <div class="card-body">
    @if(Session::has('deleted'))
    <br>
    <div class="container alert alert-success" role="alert">
      {{ Session::get('deleted') }}
    </div>
    @endif
    <div id="table" class="table-editable">
      <table id="DBTable" class="table table-bordered table-responsive-md table-striped text-center">
        <thead>
          <tr>
            <th class="text-center">#</th>
            <th class="text-center">Name</th>
            <th class="text-center">Phone</th>
            <th style="width:10%" class="text-center">Edit</th>
            <th style="width:10%" class="text-center">Delete</th>

          </tr>
        </thead>
        <tbody>
          @foreach($destinations as $destination)
          <tr>
            <td class="pt-3-half">{{ $destination->id }}</td>
            <td class="pt-3-half">{{ $destination->name }}</td>
            <td class="pt-3-half">{{ $destination->phone }}</td>
            <td class="table-view">
              <a href="editdestination/{{ $destination->id}}">
                <button type="button" class="btn btn-info btn-rounded btn-sm my-0">Edit</button>
              </a>
            </td>
            <td class="table-remove">
              <form method="POST" action="/alldestinations/{{ $destination->id }}">
                @csrf
                <button type="submit" onclick="return confirm('Are you sure you want to delete this destination?');"
                  class="btn btn-danger px-3" name="delete"><i class='fas fa-trash' aria-hidden='true'></i>
                </button>
              </form>
            </td>
          </tr>
          @endforeach

        </tbody>
      </table>
    </div>
  </div>
</div>


<script>
  window.onload = function () {
  $(document).ready(function () {
    $('#DBTable').DataTable(
      {
        "columnDefs": [
          
          { "orderable": false, "targets":4 },
          { "orderable": false, "targets":3 },
        ],
      }
    );
    $('.dataTables_length').addClass('bs-select');
  });

  const $tableID = $('#table');

  $('.table-add').on('click', 'i', () => {
    const $clone = $tableID.find('tbody tr').last().clone(true).removeClass('hide table-line');
    if ($tableID.find('tbody tr').length === 0) {
      $('tbody').append(newTr);
    }
    $tableID.find('table').append($clone);
  });

}

</script>
@endsection