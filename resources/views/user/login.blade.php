@extends('layout.main')
@section('body')
    <form action="auth" method="post">
        @csrf
        <input type="email" name="email" class="form-control mb-3" placeholder="email">
        <br>
        <span class="mb-3">
            @error('email')
                {{$message}}
            @enderror
        </span>
        <br>
        <input type="password" name="password" class="form-control mb-3" placeholder="password">
        <br>
        <span class="mb-3">
            @error('password')
                {{$message}}
            @enderror
        </span>
        <br>
        <button type="submit" class="btn btn-outline-primary">login</button>
    </form>
@endsection