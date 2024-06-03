<!-- resources/views/errors/404.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <title>Page non trouvée</title>
</head>
<body>
    <h1>404 - Page non trouvée</h1>
    <p>Le message que vous cherchez n'existe pas.</p>
    <a href="{{ url('/') }}">Retour à l'accueil</a>
</body>
</html>
