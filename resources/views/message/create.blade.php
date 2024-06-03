<!-- resources/views/message/create.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <title>Envoyer un message</title>
</head>
<body>
    <h1>Envoyer un message</h1>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="email">Email du destinataire:</label>
        <input type="email" name="email" required>
        <br>
        <label for="message">Message:</label>
        <textarea name="message" required></textarea>
        <br>
        <label for="photo">Photo:</label>
        <input type="file" name="photo">
        <br>
        <button type="submit">Envoyer</button>
    </form>
</body>
</html>
