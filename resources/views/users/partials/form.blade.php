@csrf
<table class="min-w-full leading-normal shadow-md rounded-lg overflow-hidden">
    <thead>
        <tr>
            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left">Nome</th>
            <td class="px-5 py-5 border-b border-gray--200 bg-gray-100 text-left"><input type="text" name="name" placeholder="Nome:" value="{{$user->name ?? old('name')}}"></td>
        </tr>
        <tr>
            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left">Email</th>
            <td class="px-5 py-5 border-b border-gray--200 bg-gray-100 text-left"><input type="email" name="email" placeholder="Email:" value="{{$user->email ?? old('email')}}"></a></td>
        </tr>
        <tr>
            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left">Nível</th>
            <td class="px-5 py-5 border-b border-gray--200 bg-gray-100 text-left">
                <select name="role">
                    @if (isset($user->role) && $user->role=='1')
                        <option value="1" @selected(true)>Administrador</option>
                        <option value="2">Normal</option>
                        <option value="3">Inativar</option>
                    @elseif  (isset($user->role) && $user->role=='2')
                        <option value="1">Administrador</option>
                        <option value="2" @selected(true)>Normal</option>
                        <option value="3">Inativo</option>
                    @elseif  (isset($user->role) && $user->role=='3')
                        <option value="1">Administrador</option>
                        <option value="2">Normal</option>
                        <option value="3" @selected(true)>Inativar</option>
                    @else
                        <option value="1">Administrador</option>
                        <option value="2">Normal</option>
                        <option value="3">Inativar</option>
                    @endif
                </select>
            </td>
        </tr>
        <tr>
            <th class="px-5 py-3 border-b-2 border-gray-200 bg-graay-100 text-left">Senha</th>
            <td class="px-5 py-5 border-b border-gray-200 bg-gray-100 text-left"><input type="password" name="password" placeholder="Senha:"></td>
        </tr>
        <tr>
            <th class="px-5 py-3 border-b-2 border-gray-200 bg-graay-100 text-left"></th>
            <td class="px-5 py-5 border-b border-gray-200 bg-gray-100 text-left"><button type="submit"class="bg-green-800 rounded-full py-2 px-6 text-white">Salvar</button></td>
        </tr>
    </thead>
</table>    



