<div>
   {{--  Show Tweets --}}

    {{-- Imprimindo esta propriedade, do controller "ShowTweets" --}}
    {{-- <p>{{ $message }}</p> --}}

    {{-- Fazendo um bind(de mão-dupla) do conteúdo deste input, com a propriedade "$message,
         do controller ShowTweets" --}}
    {{-- <input type="text" name="message" id="message" wire:model="message"> --}}

    @foreach ($tweets as $tweet)
        {{-- Esse "user" vem do relacionamento "muitos-para-um", do model
         "Tweet.php", que é proprietário do "tweet" --}}
        {{ $tweet->user->name }} - {{ $tweet->content }} <br>
    @endforeach
</div>
