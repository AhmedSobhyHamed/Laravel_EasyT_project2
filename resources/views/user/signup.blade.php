@extends('layout.main')
@section('body')
    <form action="reg" method="post">
        @csrf
        <input type="text" name="name" class="form-control mb-3" placeholder="user name">
        <br>
        <span class="mb-3">
            @error('name')
                {{$message}}
            @enderror
        </span>
        <br>
        <input type="email" name="email" class="form-control mb-3" placeholder="enter a new user email">
        <br>
        <span class="mb-3">
            @error('email')
                {{$message}}
            @enderror
        </span>
        <br>
        <input type="password" name="password" class="form-control mb-3" placeholder="user password">
        <br>
        <span class="mb-3">
            @error('password')
                {{$message}}
            @enderror
        </span>
        <br>
        <button type="submit" class="btn btn-outline-primary">regester</button>
    </form>
@endsection