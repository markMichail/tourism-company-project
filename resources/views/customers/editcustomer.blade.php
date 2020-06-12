@extends('layouts.app')
@section('content')

<form class="border border-light p-5" action="{{route('update',$customer->id)}}" method="POST" >
    @csrf 
    <p class="h4 mb-4 text-center">Edit Customer</p>

    <div class="form-group">
        <label for="formGroupExampleInput">Customer Name</label>
        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="formGroupExampleInput" value="{{$customer->name}}">
      
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
     
      <div class="form-group">
        <label for="formGroupExampleInput2">Phone Number</label>
        <input name="phone" type="text" class="form-control @error('phone') is-invalid @enderror" id="formGroupExampleInput2" value="{{$customer->phone}}">
        @error('phone')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
     
      <div class="form-group">
        <label for="formGroupExampleInput2">Email</label>
        <input name="email" type="text" class="form-control @error('email') is-invalid @enderror" id="formGroupExampleInput2" value="{{$customer->email}}">
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
   

    <button class="btn btn-info btn-block my-4" type="submit">Edit</button>
</form>
@endsection
