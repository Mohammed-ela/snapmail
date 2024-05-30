<!-- resources/views/message/show.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Message</title>
</head>
<body>
    <h1>Message</h1>

    <p>{{ $message->message }}</p>

    @if ($message->photo)
        <img src="{{ asset('storage/' . $message->photo) }}" alt="Photo">
    @endif
</body>
</html>
