@extends('Layout/isGuest')

@section('content')
<h2>{{ $title }}</h2>
<div>
    @foreach($articles as $article)
    <div>
      <h3><a href="/article/{{$article->id}}">{{ $article->title }}</a></h3>  
    </div>
    <hr>
    @endforeach
</div>
@endsection