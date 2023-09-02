<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'user_id'];

    /* Relacionamento de "muitos-para-um" */
    /* Vários tweets podem pertencer a um só usuário */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /* Relacionamento de "muitos-para-muitos" */
    /* Vários tweets podem ter vários likes */
    /* Retornando somente as curtidas do usuário autenticado */
    public function likes()
    {
       return $this->hasMany(Like::class)
                         /* Aplicando o filtro condicionalmente, caso
                            o usuário esteja autenticado */
                            /* Função de callback */
                        ->where(function ($query) {
                            /* Checando se o usuário está autenticado */
                            if (auth()->check()) {
                                /* Assim, só vai retornar quando o "user_id" de quem curtiu,
                                for igual ao usuário autenticado */
                                $query->where('user_id', auth()->user()->id);
                            }
                        });
    }

}
