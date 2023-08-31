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
        /* latest(): Inverte a ordem de listar os tweets,
           últimos e primeiros */
        $tweets = Tweet::with('user')->latest()->paginate(5);

        //return view('livewire.show-tweets', compact('tweetsss'));
        //ou assim, usando um array
        return view('livewire.show-tweets', [
            'tweets' => $tweets
        ]);
    }

    /* Criando um tweet com o usuário autenticado */
    public function create()
    {
        $this->validate();

            /* Pegando o usuário autenticado */
            /* tweets(): Relacionamento de um-para-muitos,
               pego do model "User.php" */
            auth()->user()->tweets()->create([
                'content' => $this->content,
            ]);


        /* Limpando o valor da variável "content" */
        $this->content = '';
    }
}
