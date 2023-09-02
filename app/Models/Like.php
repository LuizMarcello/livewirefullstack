<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    /* Estas colunas: */
    /* Qual usuário que curtiu */
    /* Qual tweet ele curtiu */
    protected $fillable = ['user_id', 'tweet_id'];

    /* Pegando qual "user" é o dono de uma determinada curtida */
    public function user()
    {
        /* Relacionamento one-to-one */
        return $this->belongsTo(User::class);
    }

    /* Pegando qual "tweet" ele curtiu */
    public function tweet()
    {
       /* Relacionamento one-to-one */
        return $this->belongsTo(Tweet::class);
    }
}
