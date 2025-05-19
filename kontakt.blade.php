<!DOCTYPE html>
<html>
<head>
    <title>Kontakt</title>
</head>
<body>
    <h1>Kontakt</h1>
    <nav>
        <a href="/">Główna</a> |
        <a href="/kontakt">Kontakt</a> |
        <a href="/oferta">Oferta</a> |
        <a href="/logowanie">Logowanie</a> |
        <a href="/profil">Profil</a>
    </nav>

    {{-- Komunikat o sukcesie --}}
    @if(session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif

    {{-- Formularz kontaktowy --}}
    <form method="POST" action="/kontakt">
        @csrf

        <label>Imię:</label><br>
        <input type="text" name="name" value="{{ old('name') }}"><br>
        @error('name')
            <small style="color:red;">{{ $message }}</small><br>
        @enderror

        <label>Email:</label><br>
        <input type="email" name="email" value="{{ old('email') }}"><br>
        @error('email')
            <small style="color:red;">{{ $message }}</small><br>
        @enderror

        <label>Wiadomość:</label><br>
        <textarea name="message">{{ old('message') }}</textarea><br>
        @error('message')
            <small style="color:red;">{{ $message }}</small><br>
        @enderror

        <button type="submit">Wyślij</button>
    </form>

    <p>Tu możesz umieścić dane kontaktowe.</p>
</body>
</html>
