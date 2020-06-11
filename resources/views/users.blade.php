@extends('layouts.app')
@section('content')

<div style=" width:95%; margin:auto">
	@if (session('successMsg'))
	<div class="alert alert-success" role="alert">
	  {{ session('successMsg') }}
	</div>
	@endif
	@if(Route::getCurrentRoute()->uri() == 'allusers/edit/2')
	<form class="border border-light p-5" action="{{route('allusers')}}" method="get" >
    @csrf 
    <p class="h4 mb-4 text-center">Edit User</p>
    <div class="form-group">
    	<label for="formGroupExampleInput">Username</label>
        <input name="name" type="text" class="form-control" id="formGroupExampleInput" value="{{$user->username}}">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Name</label>
        <input name="email" type="text" class="form-control" id="formGroupExampleInput2" value="{{$user->name}}">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Email</label>
        <input name="email" type="text" class="form-control" id="formGroupExampleInput2" value="{{$user->email}}">
    </div>
    <div class="form-group">
    	<label for="formGroupExampleInput2">Phone Number</label>
        <input name="phone" type="text" class="form-control" id="formGroupExampleInput2" value="{{$user->phone}}">
    </div>
    <button class="btn btn-info btn-block my-4" type="submit">Edit</button>
</form>
	@elseif(Route::getCurrentRoute()->uri() == 'allusers/delete')

	@else
	<h3 class="card-header text-center font-weight-bold text-uppercase py-4">All Users</h3>
  	<br>
	<table class="table table-bordered">
	  <thead class="black white-text">
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Username</th>
	      <th scope="col">Privilege</th>
	      <th scope="col">Name</th>
	      <th scope="col">Email</th>
	      <th scope="col">Phone</th>
	      <th scope="col">Action</th>
	    </tr>
	  </thead>
	  <tbody>
	  	@foreach($users as $user)
	    <tr>
	      <th scope="row">{{ $user->id }}</th>
	      <td>{{ $user->username }}</td>
	      <td>
	      	@if($user->privilege == '1')
            SuperAdmin
            @elseif($user->privilege == '2')
            Admin
            @else
            HelpDesk
            @endif
	      </td>
	      <td>{{ $user->name }}</td>
	      <td>{{ $user->email }}</td>
	      <td>{{ $user->phone }}</td>
	      <td>
	      	@if($user->privilege == '1')
            None
            @else
            <a class="btn btn-raised btn-primary btn-sm" href="{{ route('edituser', $user->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> || <a class="btn btn-raised btn-danger btn-sm" href="{{ route('deleteuser', $user->id) }}"><i class="fa fa-trash" aria-hidden="true"></i></a>
            @endif
	      </td>
	    </tr>
	    @endforeach
	  </tbody>
	</table>
	@endif
</div>
@endsection