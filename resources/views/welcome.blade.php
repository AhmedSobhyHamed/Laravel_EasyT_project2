@extends('layout.main')
@section('body')
    <h1>welcome to blog post manager</h1>
    @auth
        <p>user profile <a href="">click here</a></p>
        <p>LogOut <a href="{{route('logout')}}">click here</a></p>
    @else
    <p>log in: <a href="{{route('login')}}">click here</a></p>
    <p>register now: <a href="{{route('signup')}}">click here</a></p>
    @endauth
    <hr>
    <p>blog site can stor your blogs and view all of them</p>
    <h3>what we offer:</h3>
    <p>you can create new blog or delte existing one</p>
    <p>you can view all your blogs or just a spicific one</p>
    <p>you can you can update existing blog</p>
    <p>ou can delete all your blogs</p>
    @auth
        <hr>
        <ul>
            <li><a href="{{route('postAll')}}">show all my blogs</a></li>
            <li><a href="{{route('postCreate')}}">create new blog</a></li>
            <li>
                <form action="{{route('postsDelete')}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-outline-danger">delete all blogs</button>
                </form>
            </li>
        </ul>
    @endauth
@endsection