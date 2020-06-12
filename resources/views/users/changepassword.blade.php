@extends('layouts.app')
@section('content')

<form class="border border-light p-5" action="{{route('changepassword')}}" method="POST">
    @csrf
    <p class="h4 mb-4 text-center">Chnage User Password</p>

    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

        <div class="col-md-6">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                name="password" required autocomplete="new-password">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-info">
                Update
            </button>
        </div>
    </div>

</form>
@endsection