@extends('layouts.app')
@section('title', 'Editar {{$contact->name}}')
@section('content')
    <h1>Editar {{$contact->name}}</h1>
    @include('includes.validations-form')
<form action="{{route('contacts.update', $contact->id)}}" method="post">
    @method('PUT')
    @include('users.contacts.partials.form')
</form>
@endsection
