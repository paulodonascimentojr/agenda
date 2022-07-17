@extends('layouts.app')
@section('title', 'Novo Contato')
@section('content')
    <h1>Novo Contato de {{$user->name}}</h1>
@include('includes.validations-form')
<form action="{{route('contacts.store', $user->id)}}" method="post">
    @include('users.contacts.partials.form')
</form>
@endsection
