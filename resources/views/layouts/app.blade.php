<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curso Laravel Livewire</title>

    {{-- Diretiva blade do livewire --}}
    @livewireStyles
</head>

<body>
    <div class="container">
        {{ $slot }}
    </div>

    {{-- Diretiva blade do livewire --}}
    @livewireScripts
</body>

</html>
