@extends('Layout/isUser')

@section('content')
{{-- {{dd($articles)}} --}}
<h3>{{ $title }}</h3>
{{ session()->get('message') }}

<div>
    <form action={{ route('article_add_action') }} method="POST">
        @csrf
        <input type="text" name="title" placeholder="judul" />
        <input type="text" name="description" placeholder="deskripsi" />
        <input type="text" name="tag" placeholder="tag" />
        <button type="submit">TAMBAH</button>
    </form>
</div>

<table border="1">
    <tr>
        <th>id</th>
        <th>title</th>
        <th>description</th>
        <th>tag</th>
        <th>action</th>
    </tr>
    @foreach($articles as $article)
    <tr>
        <td>{{ $article->id }}</td>
        <td>{{ $article->title }}</td>
        <td>{{ $article->description }}</td>
        <td>{{ $article->tag }}</td>
        <td>
            <div>
                <a href="{{ route('article_edit_action', $article->id) }}">edit</a>
                <form action={{ route('article_delete_action') }} method="POST">
                    @csrf
                    <input type="hidden" name="id" value={{ $article->id }} />
                    <button type="submit">hapus</button>
                </form>
            </div>
        </td>
    </tr>
    @endforeach
</table>
<form action={{ route('dashboard_logout') }} method="POST">
   @csrf
    <input type="hidden" name="token" value={{ $users->token }}/>
    <button type="submit">Logout</button>
</form>
@endsection