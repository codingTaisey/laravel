<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>クイズ一覧</title>
</head>
<body>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>名前</th>
                <th>種別</th>
                <th>作成日時</th>
                <th>更新日付</th>
            </tr>
        </thead>
        <tbody>
            @foreach($quizzes as $quiz)
                <tr>
                    <td>{{ $quiz->id }}</td>
                    <td>{{ $quiz->name }}</td>
                    <td>{{ $quiz->type }}</td>
                    <td>{{ $quiz->created_at }}</td>
                    <td>{{ $quiz->updated_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>