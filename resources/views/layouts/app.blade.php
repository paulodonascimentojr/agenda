<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - Agenda</title>
<link rel="shortcut icon" href="{{url('images/favicon.ico')}}"type="image.png">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <div class="container mx-auto px-4 py-8">
        <tr>
            <form action="{{route('logout')}}" method="POST">
                @csrf
                <button type="submit"class="bg-red-800 rounded-full py-2 px-6 text-white">
                    Sair
                </button>
            </form>
            <br>
            <a  href="{{ url()->previous() }}">
                <i class="bg-yellow-600 rounded-full py-2 px-6 text-white">Voltar</i>
            </a>
        </tr><br>
        @yield('content')
    </div>
</body>
</html>