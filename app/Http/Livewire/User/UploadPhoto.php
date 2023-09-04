<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class UploadPhoto extends Component
{
    use WithFileUploads;

    public $photooo;

    public function render()
    {
        return view('livewire.user.upload-photo');
    }

    public function storagePhoto()
    {
        $this->validate([
            /* 'photooo' => 'required|image|max:1024' */
        ]);

        /* Pegando o objeto do usuário autenticado */
        $user = auth()->user();

        /* Nomeando o arquivo de upload, com o mesmo
           nome do usuário autenticado. A extensão
           original do arquivo permanece a mesma. */
        $nameFile = Str::slug($user->name) . '.' . $this->photooo
        ->getClientOriginalExtension();

        /* storeAs: Para salvar renomeando. */
        if ($path = $this->photooo->storeAs('users', $nameFile))
        {
            /* Para o usuário $user (autenticado), atualizando
               o valor desta coluna, no banco de dados, na
               tabela "users". */
            $user->update([
                /* Coluna da tabela, no BD */
                /* Passando o path, para onde foi movido
                   o arquivo de upload. */
                'profile_photo_path' => $path,
            ]);
        }

        return redirect()->route('tweets.index');
    }
}
