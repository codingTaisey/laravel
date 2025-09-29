@extends('common.main')

@section('body')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">名前</th>
                    <th scope="col">種別</th>
                    <th scope="col">作成日</th>
                    <th scope="col">更新日</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($quizzes as $quiz)
                <tr>
                    <td>{{ $quiz->id }}</td>
                    <td>{{ $quiz->name }}</td>
                    <td>{{ $quiz->category }}</td>
                    <td>{{ $quiz->created_at }}</td>
                    <td>{{ $quiz->updated_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection