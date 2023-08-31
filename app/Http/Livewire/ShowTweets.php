<?php

namespace App\Http\Livewire;

use App\Models\Tweet;
use Livewire\Component;
use Livewire\WithPagination;

class ShowTweets extends Component
{
    /* Para evitar de fazer o reload das páginas */
    use WithPagination;

    public $content = 'Apenas um teste';

    protected $rules = [
        'content' => 'required|min:3|max:255'
    ];

    public function render()
    {
        /* with(): Qual relacionamento(o tweet com seu proprietário)
           estará usando, senão, para cada tweet, faria uma pesquisa no bd */
        $tweets = Tweet::with('user')->paginate(2);

        //return view('livewire.show-tweets', compact('tweetsss'));
        //ou assim, usando um array
        return view('livewire.show-tweets', [
            'tweets' => $tweets
        ]);
    }

    public function create()
    {
        $this->validate();

        Tweet::create([
            'content' => $this->content,
            'user_id' => 1
        ]);

        /* Limpando o valor da variável "content" */
        $this->content = '';
    }
}
