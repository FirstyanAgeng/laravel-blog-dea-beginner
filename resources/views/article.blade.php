@extends('Layout/isGuest')

@section('content')
<h2>{{ $title }}</h2>
<div> 
    <h3>{{ $article->title }}</h3>
    <p>{{ $article->description }}</p>
    <p>{{ $article->tag }}</p>
</div>
<a href="/">kembali</a>
@endsection