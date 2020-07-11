@extends('simple-works')

@section('head')
    <link href="/css/app.css" rel="stylesheet" type="text/css" media="all"/>
@endsection

@section('content')
    <div id="page" class="container">
        <h1>New Article</h1>

        <form action="/articles" method="POST">
            @csrf
            <label for="title">title</label>
            <br>
            <input id="title" type="text" name="title" value="{{@old('title')}}">
            @error('title')
                <p class="error">{{$errors->first('title')}}</p>
            @enderror

            <br><br>

            <label for="excerpt">Excerpt</label>
            <br>
            <input type="text" id="excerpt" name="excerpt">
            @error('excerpt')
            <p class="error">{{$errors->first('excerpt')}}</p>
            @enderror

            <br><br>

            <label for="body">Body</label>
            <br>
            <textarea type="text" id="body" name="body"></textarea>
            <br>
            <button type="submit">Submit</button>
        </form>
    </div>
@endsection
