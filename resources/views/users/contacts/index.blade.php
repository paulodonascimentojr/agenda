@extends('layouts.app')
@section('title', 'Agenda de Contatos')
@section('content')
    <table class="min-w-full leading-normal shadow-md rounded-lg overflow-hidden">
        <tr>
            <th>
                Agenda de Contatos de {{$user->name}} 
                <a href="{{route('contacts.create', $user->id)}}" class="bg-purple-200 rounded-full py-1 px-3">Novo contato</a><br>
            </th>
        </tr>
        <tr>
            <th><br>
                <form action="{{route('contacts.index', $user->id)}}" method="get">
                    <input type="text" name="search" placeholder="Pesquisar">
                    <button class="bg-red-200 rounded-full py-1 px-4">Pesquisar</button>
                </form>
            </th>
        </tr>
    </table>
    <table class="min-w-full leading-normal shadow-md rounded-lg overflow-hidden">
        <thead>
            <tr>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-graay-100 text-left">Nome</th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-graay-100 text-left">Email</th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-graay-100 text-left">Telefone</th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-graay-100 text-left">Usuário GitHub</th>
                @if (isset(Auth::user()->role) && Auth::user()->role=='1' && Auth::user()->id == $user->id)
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-graay-100 text-left">Editar</th>
                @endif
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-graay-100 text-left">Detalhes</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
            <tr>
                <td class="px-5 py-5 border-b border-gray-200 bg-graay-100 text-left">{{$contact->name}}</td>
                <td class="px-5 py-5 border-b border-gray-200 bg-graay-100 text-left">{{$contact->email}}</td>
                <td class="px-5 py-5 border-b border-gray-200 bg-graay-100 text-left">{{$contact->phone}}</td>
                <td class="px-5 py-5 border-b border-gray-200 bg-graay-100 text-left">{{$contact->git}}</td>
                @if (isset(Auth::user()->role) && Auth::user()->role=='1' && Auth::user()->id == $user->id)
                    <td class="px-5 py-5 border-b border-gray-200 bg-graay-100 text-left"><a href="{{route('contacts.edit', ['user' => $user->id, 'id' => $contact->id])}}" class="bg-green-200 rounded-full py-2 px-6">Editar</a></td>
                @endif
                <td class="px-5 py-5 border-b border-gray-200 bg-graay-100 text-left"><a href="{{route('contacts.show', ['user' => $user->id, 'id' => $contact->id])}}" class="bg-orange-200 rounded-full py-2 px-6">Detalhes</a></td>
            </tr>
            @endforeach
        </tbody> 
    </table>    
    <div class="py-4">
        {{$contacts->appends(['search' => request()->get('search', '')])->links()}}
    </div>
@endsection
