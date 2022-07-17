<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'git',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getContacts(string|null $search = null)
    {
        $contacts = $this->where(function ($query) use ($search){
            if($search){
                $query->where('name', 'LIKE', "%{$search}%");
                $query->orWhere('email', 'LIKE', "%{$search}%");
                $query->orderBy('name', 'ASC');
            }
        })->get();
        return $contacts;
    }
}
