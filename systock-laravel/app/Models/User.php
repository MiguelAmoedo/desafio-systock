<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

 
    protected $fillable = [
        'name',
        'email',
        'password',
        'cpf',
    ];

  
    protected $hidden = [
        'password', 
    ];

    // Validar os dados com regras customizadas
    public static $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6|confirmed',
        'cpf' => 'required|cpf|unique:users,cpf',
    ];
}
