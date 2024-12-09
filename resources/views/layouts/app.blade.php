<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Minha Aplicação')</title>
    <!-- Inclua outros estilos, scripts e metadados aqui -->
</head>
<body>
    <header>
    Teste    
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
    Teste 2
    </footer>
</body>
</html>
