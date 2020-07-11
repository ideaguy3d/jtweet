@extends('simple-works')

@section('head')
    <link href="/css/app.css" rel="stylesheet" type="text/css" media="all"/>
@endsection

@section('content')
    <div id="page" class="container">
        <h1>Edit Article</h1>

        <form action="/articles/{{$article->id}}" method="POST">
            @csrf
            @method('PUT')

            <label for="title">title</label>
            <br>
            <input id="title" type="text" name="title" value="{{$article->title}}">
            @if($errors->has('title'))
                <p class="error">{{$error->first('title')}}</p>
            @endif

            <br><br>

            <label for="excerpt">Excerpt</label>
            <br>
            <input type="text" id="excerpt" name="excerpt" value="{{$article->excerpt}}">

            <br><br>

            <label for="body">Body</label>
            <br>
            <textarea id="body" name="body">
                {{$article->body}}
            </textarea>
            <br>
            <button type="submit">Submit</button>
        </form>
    </div>
@endsection