<div>
    <h2>Atualizar a foto do perfil</h2>

    {{-- wire:submit.prevent: Fazendo um "bind" com o action storagePhoto()
         no controller(componente) UploadPhoto --}}
    <form action="#" method="POST" wire:submit.prevent="storagePhoto">
        {{-- wire:submit.prevent: Enviando o conteúdo(fazendo bind) deste input para a
             propriedade "$photooo", no controller(componente) "UploadPhoto" --}}
        <input type="file" name="" id="" wire:model="photooo">
        {{-- Diretiva do blade para êrros --}}
        @error('photooo')
            {{ $message }}
        @enderror
        <br>
        <button type="submit">Upload Foto</button>
    </form>
</div>
