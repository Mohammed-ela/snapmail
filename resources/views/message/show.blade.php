
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <title>Message</title>
</head>
<body>
    <h1>Message</h1>

    <p>{{ $message->message }}</p>
<!-- si il y'a une photo qui est recuperer on affiche -->
    @if ($photoPath)
        <img src="{{ $photoPath }}" alt="Photo">
    @endif
</body>
</html>
