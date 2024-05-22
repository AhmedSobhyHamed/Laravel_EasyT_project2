@extends('layout.main')

@section('body')
    @auth
        <section>
            <form action="{{route('postUpdate',['id'=>$post->id])}}" method="post">
                @csrf
                @method('put')
                <label class="form-lable">title</label>
                <input type="text" name="title" class="form-control mb-3" value="{{$post->title}}">
                <br>
                <span class="text-danger mb-3">
                    @error('title')
                        {{$message}}
                    @enderror
                </span>
                <br>
                <label class="form-lable">title</label>
                <textarea name="content" class="form-control mb-3">{{$post->content}}</textarea>
                <br>
                <span class="text-danger mb-3">
                    @error('content')
                        {{$message}}
                    @enderror
                </span>
                <br>
                <button type="submit" class="btn btn-success">update</button>
            </form>
        </section>
    @endauth
@endsection