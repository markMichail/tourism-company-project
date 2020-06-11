@extends('layouts.app')
@section('content')

<form class="border border-light p-5" action="{{route('updateuser',$user->id)}}" method="POST">
    @csrf
    <p class="h4 mb-4 text-center">Edit User</p>

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
        <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required
                autocomplete="name" autofocus value="{{ $user->name }}">
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                required autocomplete="email" value="{{ $user->email }}">

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

        <div class="col-md-6">
            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"
                required autocomplete="phone" value="{{ $user->phone }}">

            @error('Phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="privilege" class="col-md-4 col-form-label text-md-right">{{ __('Privilege') }}</label>

        <div class="col-md-6">
            <select id="privilege" class="form-control @error('privilege') is-invalid @enderror" name="privilege"
                required>
                {{ $roles = DB::table('roles')->get() }}
                @foreach ($roles as $role)
                @if($role->id == '1')
                <option value="{{$role->id}}" disabled hidden>{{$role->name}}</option>
                @else
                @if ($user->privilege == $role->id)
                <option value="{{$role->id}}" selected>{{$role->name}}</option>
                @else
                <option value="{{$role->id}}">{{$role->name}}</option>
                @endif

                @endif
                @endforeach
            </select>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-info">
                Edit
            </button>
        </div>
    </div>

</form>
@endsection