<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory;
// cria uma validação só grava na tabela se não tiver nada além desses campos
    protected $fillable = [
        'subject',
        'body',
        'status'
    ];
}
