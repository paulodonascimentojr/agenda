<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUserFormRequest;
use App\Models\{Contact, User};
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    protected $model;
    public function __construct(User $user)
    {
        $this->model = $user; 
    }

    public function index(Request $request)
    {
        $users = $this->model
                        ->getUsers(
                            search: $request->search ?? ''
                        );
        $index=Auth::user()->id;
        
        if(Auth::user()->role == 2)
            return redirect('contacts/'.Auth::user()->id);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(StoreUpdateUserFormRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        $this->model->create($data);
        return redirect()->route('users.index');
    }

    public function show($id)
    {
        if(!$user = $this->model::find($id))
        {
            return redirect()->route('users.index');
        }
        $index=Auth::user()->id;
        if(Gate::denies('manage-users')){
            return redirect('contacts/'.$index);
        }
        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        if(!$user = $this->model::find($id))
            return redirect()->route('users.index');
            $index=Auth::user()->id;
        if(Gate::denies('manage-users')){
           return redirect('contacts/'.$index);
        }    
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        if(!$user = $this->model::find($id))
            return redirect()->route('users.index');
        $data = $request->only('name', 'email', 'role');
        if ($request->password)
            $data['password'] = bcrypt($request->password);
        $user->update($data);
        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        if(!$user = $this->model::find($id))
            return redirect()->route('users.index');
        $user->delete();
        return redirect()->route('users.index');
    }
}
