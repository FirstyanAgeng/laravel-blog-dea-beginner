@extends('Layout/isGuest')

@section('content')
<div>
    <h3>LOGIN PAGE</h3>
    <i>{{ session()->get('error') }}</i>
    <form action={{route('login_action')}} method="POST">
        @csrf
        <input type="text" name="username" placeholder="username"/>
        <input type="password" name="password" placeholder="password"/>
        <button type="submit">Login</button>
    </form>
</div>
@endsection