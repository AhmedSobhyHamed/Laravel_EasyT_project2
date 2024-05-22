@extends('layout.main')
@section('body')
    <section>
        <a href="{{route('welcome')}}">&lt; &lt; go to welcome page</a>
    </section>
    <section>
        <ul>
            @forelse ($posts as $post)
                <li @if ($post->auther === Illuminate\Support\Facades\Auth::id()) style="background:#eee" @endif>
                    <hr>
                    <p>title: {{$post->title}}</p>
                    <p>user name: {{App\Models\User::find($post->auther)->name}}</p>
                    <a href="{{route('postView',$post->id)}}">see more</a>
                    <hr>
                </li>
            @empty
                <p>empty blog</p>
                <p>create new post:<a href="{{route('postCreate')}}">click here</a></p>
            @endforelse
        </ul>
    </section>
@endsection