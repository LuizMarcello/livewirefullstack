<div>
     Show Tweets

    {{-- Imprimindo esta propriedade, do controller "ShowTweets" --}}
    <p>{{ $message }}</p>

    {{-- Fazendo um bind(de mão-dupla) do conteúdo deste input, com a propriedade "$message,
         do controller ShowTweets" --}}
    {{-- wire:submit.prevent: Enviando o conteúdo do input para o método "create()"
         do controller "ShowTweets" --}}
    <form method="post" wire:submit.prevent="create">
        @method('GET')
        <input type="text" name="message" id="message" wire:model="message">
        <button type="submit">Criar Tweet</button>
        <br>
        <br>
    </form>


    @foreach ($tweets as $tweet)
        {{-- Esse "user" vem do relacionamento "muitos-para-um", do model
         "Tweet.php", que é proprietário do "tweet" --}}
        {{ $tweet->user->name }} - {{ $tweet->content }} <br>
    @endforeach
</div>
