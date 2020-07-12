@extends('simple-works')

@section('head')
    <link href="/css/app.css" rel="stylesheet" type="text/css" media="all"/>
@endsection

@section('content')
    <div id="page" class="container">
        <h1>New Article</h1>

        <form action="/articles" method="POST">
            @csrf

            <div class="@error('title') error @enderror">
                <label for="title">title</label>
                <br>
                <input id="title" type="text" name="title" value="{{@old('title')}}">
            </div>
            @error('title')
            <p class="error">{{$errors->first('title')}}</p>
            @enderror

            <br><br>

            <div class="@error('excerpt') error @enderror">
                <label for="excerpt">Excerpt</label>
                <br>
                <input type="text" id="excerpt" name="excerpt">
            </div>
            @error('excerpt')
            <p class="error">{{$errors->first('excerpt')}}</p>
            @enderror

            <br><br>

            <div class="@error('body') error @enderror">
                <label for="body">Body</label>
                <br>
                <textarea id="body" name="body">
                {{old('body')}}
            </textarea>
            </div>
            @error('body')
            <p class="error">{{$errors->first('body')}}</p>
            @enderror

            <br>
            <button type="submit">Submit</button>
        </form>
    </div>
@endsection
