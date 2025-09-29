<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    {{-- authディレクティブ --}}
    @auth
        ログイン済み
    @else
        未ログイン
    @endauth

    <br>

    {{-- guestディレクティブ --}}
    @guest
        未ログインです
    @else
        ログイン済みです
    @endguest
</body>
</html>

</body>
</html>