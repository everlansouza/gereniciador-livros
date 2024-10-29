<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // Adicione apenas os campos do formulário que você quer preencher diretamente
    protected $fillable = ['title', 'author', 'description'];
}
