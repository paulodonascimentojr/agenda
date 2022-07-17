@extends('layouts.app')
@section('title', 'Usuário')
@section('content')
    <h1>Listagem de usuário {{$user->name}}</h1>

    <ul>
        <li>{{$user->name}}</li>
        <li>{{$user->email}}</li>
        <li>{{$user->role}}</li>
        <script src="{{asset('js/api_git.js')}}"></script>
    </ul>
    <script>
        
    </script>
@endsection