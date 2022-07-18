@extends('layouts.app')
@section('title', 'Lista de Usuários')
@section('content')
    
    <table class="min-w-full leading-normal shadow-md rounded-lg overflow-hidden">
        <tr>
            <th>
                Listagem de usuários
                
                <a href="{{route('users.create')}}" class="bg-purple-200 rounded-full py-1 px-3">Novo</a><br>
            </th>
        </tr>
        <tr>
            <th><br>
                <form action="{{route('users.index')}}" method="get">
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
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-graay-100 text-left">Administrador</th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-graay-100 text-left">Editar</th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-graay-100 text-left">Agenda</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                @if($user->role != 3)
                    <tr>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{$user->name}}</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{$user->email}}</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{$user->role == 1 ? 'Sim' : 'Não'}}</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm"><a href="{{route('users.edit', $user->id)}}" class="bg-green-200 rounded-full py-2 px-6">Editar</a></td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm"><a href="{{route('contacts.index', $user->id)}}" class="bg-orange-200 rounded-full py-2 px-6">{{$user->contacts->count()}} Contatos</a></td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>    
    <div class="py-4">
        {{$users->appends(['search' => request()->get('search', '')])->links()}}
    </div>
@endsection
