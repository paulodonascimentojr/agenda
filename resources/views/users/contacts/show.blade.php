@extends('layouts.app')
@section('title', 'Contato')
@section('content')

    <table class="min-w-full leading-normal shadow-md rounded-lg overflow-hidden">
        <thead>
            <tr>
                <th>
                    <tr>
                        Contato de {{$user->name}} 
                    </tr>
                    <tr>
                        @if (isset(Auth::user()->role) && Auth::user()->role=='1' && Auth::user()->id == $user->id)
                            <form action="{{route('contacts.destroy', $contact->id)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit"class="bg-red-200 rounded-full py-1 px-4">Excluir</button>
                            </form>
                        @endif
                    </tr>
                </th>
            </tr>
        </thead>
        <tbody>
            <td>
                <tr>
                    <td class="px-5 py-3 border-b-2 border-gray-200 bg-graay-100 text-left">Nome:</td>
                    <td class="px-5 py-3 border-b-2 border-gray-200 bg-graay-100 text-left">{{$contact->name}}</td>
                    <td class="px-5 py-3 border-b-2 border-gray-200 bg-graay-100 text-left">GitHub:</td>
                    <td class="px-5 py-3 border-b-2 border-gray-200 bg-graay-100 text-left">{{$contact->git}}</td>
                </tr>
                <tr>
                    <td class="px-5 py-3 border-b-2 border-gray-200 bg-graay-100 text-left">Email:</td>
                    <td class="px-5 py-3 border-b-2 border-gray-200 bg-graay-100 text-left">{{$contact->email}}</td>
                    <td class="px-5 py-3 border-b-2 border-gray-200 bg-graay-100 text-left">Telefone:</td>
                    <td class="px-5 py-3 border-b-2 border-gray-200 bg-graay-100 text-left">{{$contact->phone}}</td>
                </tr>
            </td>
            <td>
            </td>
            <td>
                <ul><br></ul>
                <script>
                    const ul = document.querySelector('ul')
                    function getApiGitHub() {
                    fetch('https://api.github.com/users/{{$contact->git}}/repos')
                        .then(async res => {
                        if(!res.ok) {
                            throw new Error(res.status)
                        }
                        var data = await res.json()
                        data.map(item => {
                            let li = document.createElement('li')
                            li.innerHTML = `<br>
                            <strong>${item.name.toUpperCase()}</strong><br>
                            <span>URL: ${item.html_url} </span><br>
                            <span>Data Criação: 
                            ${Intl.DateTimeFormat('pt-BR')
                                .format(new Date(item.created_at))}
                            </span>`
                        ul.appendChild(li)
                        })
                        }).catch(e => console.log(e))
                    }
                    getApiGitHub()
                </script>
            </td>
        </tbody>
            
        
    </table>
@endsection