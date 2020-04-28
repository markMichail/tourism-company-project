@extends('layouts.app')
@section('content')

<form class="border border-light p-5" action="{{route('update',$customer->id)}}" method="POST" >

    <p class="h4 mb-4 text-center">Edit Customer</p>

    <div class="form-group">
        <label for="formGroupExampleInput">Customer Name</label>
        <input type="text" class="form-control" id="formGroupExampleInput" value="{{$customer->name}}">
      </div>

      <div class="form-group">
        <label for="formGroupExampleInput2">Phone Number</label>
        <input type="text" class="form-control" id="formGroupExampleInput2" value="{{$customer->phone}}"
      </div>

      <div class="form-group">
        <label for="formGroupExampleInput2">Email</label>
        <input type="text" class="form-control" id="formGroupExampleInput2" value="{{$customer->email}}"
      </div>

    <button class="btn btn-info btn-block my-4" type="submit">Edit</button>
</form>
@endsection
