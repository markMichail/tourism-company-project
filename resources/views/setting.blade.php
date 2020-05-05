@extends('layouts.app')
@section('content')

<br>
<div class="container">
    <!-- Default form register -->
    <form class="text-center border border-light p-5" action="{{ route('settingUpdate') }}" method="POST">
        @csrf
        <p class="h4 mb-4">Settings</p>
        @if(session('status'))
        <br>
        <div class="alert alert-success" role="alert">
            {{ Session::get('status') }}
        </div>
        @endif
        @foreach ($settings as $i => $setting)
        <div class="form-row mb-4">
            <label>{{ $setting->label }}</label>
            <input type="{{ $setting->type }}" name="setting[{{ $setting->id }}]" class="form-control"
                value="{{ $setting->value }}">
        </div>
        @endforeach

        <button class="btn btn-info my-4 btn-block md" type="submit">Update</button>

    </form>
    <!-- Default form register -->
</div>

@endsection