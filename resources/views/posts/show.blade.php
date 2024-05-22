@extends('layout.main')

@section('body')
    @auth
    <section>
        <a href="{{route('postAll')}}">&lt; &lt; go back</a>
    </section>
    <hr>
        <section class="border rounded">
            <h2>{{$post->title}}</h2>
            <p>Who write:{{App\Models\User::find($post->auther)->name}}</p>
            <p>{{$post->content}}</p>
            @if ($auther)
                <a href="{{route('postEdit',['id' => $post->id])}}" class="btn btn-outline-primary">edit</a>
                <br>
                <form action="{{route('postDelete',['id'=>$post->id])}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-outline-danger">delete</button>
                </form>
                {{-- <a href="{{route('postDelete',['id'=>$post->id])}}" class="btn btn-outline-danger">delete</a> --}}
            @endif
        </section>
    @endauth
@endsection