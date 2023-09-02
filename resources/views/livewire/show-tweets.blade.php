<div>
    Show Tweets

    {{-- Imprimindo esta propriedade, do controller "ShowTweets" --}}
    <p>{{ $content }}</p>

    {{-- Fazendo um bind(de mão-dupla) do conteúdo deste input, com a propriedade "$content,
         do controller ShowTweets" --}}
    {{-- wire:submit.prevent: Enviando o conteúdo do input para o método "create()"
         do controller "ShowTweets" --}}
    <form method="post" wire:submit.prevent="create">
        @method('GET')
        <input type="text" name="content" id="content" wire:model="content">
        {{-- Mensagem de êrro, se existir algum êrro de validação --}}
        @error('content')
            {{ $message }}
        @enderror
        <button type="submit">Criar Tweet</button>
        <br>
        <br>
    </form>


    @foreach ($tweets as $tweet)
        {{-- Esse "user" vem do relacionamento "muitos-para-um", do model
         "Tweet.php", que é proprietário do "tweet" --}}
        {{ $tweet->user->name }} - {{ $tweet->content }}
        {{-- Pegando todas as curtidas que este tweet teve --}}
        @if ($tweet->likes->count())
            {{-- Fazendo aqui, a "ação" de descurtir--}}
            {{-- wire: Escuta os eventos(click, no caso) --}}
            {{-- unlike(): Lá do ShowTweets.php(Componente) --}}
            {{-- {{ }}: Blade --}}
            <a href="#" wire:click.prevent="unlike({{ $tweet->id }})">Descurtir</a>
        @else
            {{-- Fazendo aqui, a "ação" de curtir--}}
            {{-- wire: Escuta os eventos(click, no caso) --}}
            {{-- like(): Lá do ShowTweets.php(Componente) --}}
            {{-- {{ }}: Blade --}}
            <a href="#" wire:click.prevent="like({{ $tweet->id }})">Curtir</a>
        @endif
        <br>
    @endforeach
    <hr>
    {{-- Para fazer a paginação --}}
    <div>
        {{ $tweets->links() }}
    </div>
</div>
