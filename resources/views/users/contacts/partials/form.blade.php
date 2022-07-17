@csrf
<table class="min-w-full leading-normal shadow-md rounded-lg overflow-hidden">
    <thead>
        <tr>
            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left">Nome</th>
            <td class="px-5 py-5 border-b border-gray-"><input type="text" name="name" placeholder="Nome:" value="{{$contact->name ?? old('name')}}"></td>
        </tr>
        <tr>
            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left">Email</th>
            <td class="px-5 py-5 border-b border-gray-"><input type="email" name="email" placeholder="Email:" value="{{$contact->email ?? old('email')}}"></a></td>
        </tr>
        <tr>
            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left">Telefone</th>
            <td class="px-5 py-5 border-b border-gray-"><input type="text" name="phone" placeholder="Telefone:" value="{{$contact->phone ?? old('phone')}}"></td>
        </tr>
        <tr>
            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left">GitHub</th>
            <td class="px-5 py-5 border-b border-gray-"><input type="text" name="git" placeholder="GitHub:" value="{{$contact->git ?? old('git')}}"></td>
        </tr>
        <tr>
            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left"></th>
            <td class="px-5 py-5 border-b border-gray-"><button type="submit"class="bg-green-800 rounded-full py-2 px-6 text-white">Salvar</button></td>
        </tr>
    </thead>
    <tbody>
        <tr>
        </tr>
    </tbody>
</table>    



