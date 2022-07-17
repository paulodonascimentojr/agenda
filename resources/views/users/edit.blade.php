@extends('layouts.app')
@section('title', 'Editar {{$user->name}}')
@section('content')
    <h1>Editar {{$user->name}}</h1>
    @include('includes.validations-form')
<form action="{{route('users.update', $user->id)}}" method="post">
    @method('PUT')
    @include('users.partials.form')
</form>
@endsection
