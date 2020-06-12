@extends('layouts.app')
@section('content')

<!-- Editable table -->
<div class="card">
  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">All Users table</h3>
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
            <th class="text-center">Email</th>
            <th class="text-center">Username</th>
            <th class="text-center">Phone</th>
            <th class="text-center">Role</th>
            <th style="width:10%" class="text-center">Edit</th>
            <th style="width:10%" class="text-center">Delete</th>

          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
          <tr>
            <td class="pt-3-half">{{ $user->id }}</td>
            <td class="pt-3-half">{{ $user->name }}</td>
            <td class="pt-3-half">{{ $user->email }}</td>
            <td class="pt-3-half">{{ $user->username }}</td>
            <td class="pt-3-half">{{ $user->phone }}</td>
            <td class="pt-3-half">{{ $user->role->name }}</td>
            <td class="table-view">
              <a href="edituser/{{ $user->id}}">
                <button type="button" class="btn btn-info btn-rounded btn-sm my-0">Edit</button>
              </a>
            </td>
            <td class="table-remove">
              <form method="POST" action="/allusers/{{ $user->id }}">
                @csrf
                <button type="submit" onclick="return confirm('Are you sure you want to delete this user?');"
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
        ],
      }
    );
    $('.dataTables_length').addClass('bs-select');
  });

  const $tableID = $('#table');

  const newTr = `
  <tr class="hide">
  <td class="pt-3-half">Example</td>
  <td class="pt-3-half">Example</td>
  <td class="table-remove">
  <button type="button" class="btn btn-danger btn-rounded btn-sm my-0 waves-effect waves-light">Remove</button>
  </td>
  </tr>`;

  $('.table-add').on('click', 'i', () => {
    const $clone = $tableID.find('tbody tr').last().clone(true).removeClass('hide table-line');
    if ($tableID.find('tbody tr').length === 0) {
      $('tbody').append(newTr);
    }
    $tableID.find('table').append($clone);
  });

  $('#ok_button').click(function(){
    $.ajax({
      url:"order/delete/"+user_id,
      beforeSend:function(){
        $('#ok_button').text('Deleting...');
      },
      success:function(data)
      {
        $('#confirmModal').modal('hide');
        row.detach();
      }
    })
  });


  // $tableID.on('click', '.table-view', function () {
  //   alert("view page ISA");
  //   // $(this).parents('tr').detach();
  // });

}

</script>
@endsection