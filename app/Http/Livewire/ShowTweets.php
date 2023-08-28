<?php

namespace App\Http\Livewire;

use App\Models\Tweet;
use Livewire\Component;

class ShowTweets extends Component
{
    public $message = 'Apenas um teste';

    public function render()
    {
        /* with(): Qual relacionamento(o tweet com seu proprietário)
           estará usando, senão, para cada tweet, faria uma pesquisa no bd */
        $tweets = Tweet::with('user')->get();

        //return view('livewire.show-tweets', compact('tweetsss'));
        //ou assim, usando um array
        return view('livewire.show-tweets', [
            'tweets' => $tweets
        ]);
    }

    public function create()
    {
        Tweet::create([
            'content' => $this->message,
            'user_id' => 1
        ]);

        /* Limpando o valor da variável "message" */
        $this->message = '';
    }
}
