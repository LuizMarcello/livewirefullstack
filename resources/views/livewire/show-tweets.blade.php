<div>
    Show Tweets

    {{-- Imprimindo esta propriedade, do controller "ShowTweets" --}}
    <p>{{ $message }}</p>

    {{-- Fazendo um bind(de mão-dupla) do conteúdo deste input, com a propriedade "$message,
         do controller ShowTweets" --}}
    <input type="text" name="message" id="message" wire:model="message">
</div>
