<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateContactRequest;
use Illuminate\Http\Request;
use App\Models\{Contact, User};
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    protected $user;
    protected $contact;

    public function __construct(Contact $contact, User $user)
    {
        $this->contact = $contact;
        $this->user = $user;
    }

    public function index(Request $request, $userId)
    {
        if(!$user = $this->user->find($userId))
            return redirect()->back();
        $contacts = $user->contacts()
                            ->where('name', 'LIKE', "%{$request->search}%")
                            ->paginate(8);
        return view('users.contacts.index', compact('user', 'contacts'));
    }

    public function create($userId)
    {
        if(!$user = $this->user->find($userId))
            return redirect()->back();
            
        return view('users.contacts.create', compact('user'));
    }

    public function show($userId, $id)
    {
        if(!$contact = $this->contact->find($id))
            return redirect()->back();
        $user = $contact->user; 
        return view('users.contacts.show', compact('user', 'contact'));
    }

    public function store(StoreUpdateContactRequest $request, $userId)
    {
        if(!$user = $this->user->find($userId))
            return redirect()->back();
        
        $user->contacts()->create($request->all());
        return redirect()->route('contacts.index', $user->id);
    }

    public function edit($userId, $id)
    {
        if(!$contact = $this->contact->find($id))
            return redirect()->back();
        if(Auth::user()->id != $userId)
            return redirect()->back();
        
        $user = $contact->user;    
        return view('users.contacts.edit', compact('user', 'contact'));
    }

    public function update(StoreUpdateContactRequest $request, $id)
    {
        if(!$contact = $this->contact->find($id))
            return redirect()->back();
        
        $contact->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'git' => $request->git,
        ]);
        return redirect()->route('contacts.index', $contact->user_id);
    }

    public function destroy($id)
    {
        if(!$contact = $this->contact->find($id))
            return redirect()->back();
        $contact->delete();
        return redirect()->route('contacts.index', $contact->user_id);
    }

}
