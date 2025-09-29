{{-- layouts/common.main.blade.php をベースとして使うことを宣言 --}}
@extends('common.main')

{{-- mainセクションに以下の内容を表示する --}}
@section('content')

{{-- バリデーションエラーがある場合に表示 --}}
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

{{-- h1タグを指示通り修正 --}}
<h1>クイズ更新画面</h1>

{{-- formタグのaction属性を指示通り設定 --}}
<form action="{{ url('quiz12/update/' . $quiz->id) }}" method="post">
    {{-- Laravelのフォームで必須のCSRF対策 --}}
    @csrf

    <p>
        {{-- input(name)にvalue属性を追記 --}}
        <input type="text" name="name" value="{{ $quiz->name }}" placeholder="名前を入力">
    </p>
    <p>
        {{-- input(type)にvalue属性を追記 --}}
        <input type="number" name="type" value="{{ $quiz->type }}" placeholder="数値を入力">
    </p>
    <p>
        <input type="submit" value="送信ボタン">
    </p>
</form>

@endsection