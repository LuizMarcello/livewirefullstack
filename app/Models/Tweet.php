<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory;

    protected $fillable = ['content'];

    /* Relacionamento de "muitos-para-um" */
    /* Vários tweets podem pertencer a um só usuário */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
