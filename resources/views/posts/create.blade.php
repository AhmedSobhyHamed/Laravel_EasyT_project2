@extends('layout.main')

@section('body')
    @auth
        <section>
            <form action="{{route('postStore')}}" method="post">
                @csrf
                <label class="form-lable">title</label>
                <input type="text" name="title" class="form-control mb-3">
                <br>
                <span class="text-danger mb-3">
                    @error('title')
                        {{$message}}
                    @enderror
                </span>
                <br>
                <label class="form-lable">title</label>
                <textarea name="content" class="form-control mb-3"></textarea>
                <br>
                <span class="text-danger mb-3">
                    @error('content')
                        {{$message}}
                    @enderror
                </span>
                <br>
                <button type="submit" class="btn btn-success">create</button>
            </form>
        </section>
    @endauth
@endsection