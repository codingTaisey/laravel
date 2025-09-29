<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @if ($fruits === "orange")
        <p>ミカンです！</p>
    @elseif ($fruits === "apple")
        <p>リンゴです！</p>
    @else
        <p>その他の果物です！</p>
    @endif
</body>
</html>