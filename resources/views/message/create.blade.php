
<!DOCTYPE html>
<html>
<head>
    <title>Envoyer un message</title>
</head>
<body>
    <h1>Envoyer un message</h1>

    <form action="/" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="email">Email du destinataire:</label>
        <input type="email" name="email" required>
        <br>
        <label for="message">Message:</label>
        <textarea name="message" required></textarea>
        <br>
        <label for="photo">Photo (optionnel):</label>
        <input type="file" name="photo">
        <br>
        <button type="submit">Envoyer</button>
    </form>
</body>
</html>
