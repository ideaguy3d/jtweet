@extends('simple-works')

@section('content')
    <div class="container">
        <ol>
        @foreach($articles as $article)
            <li>
                <h3><a href="/articles/{{$article->id}}">{{$article->title}}</a></h3>

                <p><a href="/articles/{{$article->id}}">{{$article->excerpt}}</a></p>
            </li>
        @endforeach
        </ol>
    </div>
@endsection