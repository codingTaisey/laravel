<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>一覧表示</title>
    <style>
        /* 簡単なスタイルで見やすくします */
        body { font-family: sans-serif; padding: 20px; }
        table { border-collapse: collapse; width: 80%; margin-bottom: 30px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        h2 { border-bottom: 2px solid #007bff; padding-bottom: 10px; }
    </style>
</head>
<body>

    <h2>Companiesテーブル</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>会社名</th>
                <th>創立日</th>
                <th>住所</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($companies as $company)
                <tr>
                    <td>{{ $company->id }}</td>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->founded_at }}</td>
                    <td>{{ $company->address }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>salesテーブル</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>企業ID</th>
                <th>売上</th>
                <th>売上日</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sales as $sale)
                <tr>
                    <td>{{ $sale->id }}</td>
                    <td>{{ $sale->company_id }}</td>
                    <td>{{ $sale->amount }}</td>
                    <td>{{ $sale->sale_date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>