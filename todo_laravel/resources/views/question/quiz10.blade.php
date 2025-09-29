@extends('common.main')

@section('body')
<div class="container mx-auto p-4">
    <h1>クイズ登録画面</h1>
    
    <!-- 【課題に対応】バリデーションエラーメッセージ表示エリア -->
    @if ($errors->any())
        <div class="alert alert-danger p-4 mb-4 bg-red-100 border border-red-400 text-red-700 rounded">
            <ul class="list-disc ml-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <!-- フォームアクションはroute('quiz10_test2')を使用 -->
    <form action="{{ route('quiz10_test2') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-bold mb-2">名前を入力</label>
            <!-- old()関数で、バリデーション失敗時に前の入力値を保持 -->
            <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="名前を入力" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        
        <div class="mb-6">
            <label for="type" class="block text-gray-700 font-bold mb-2">数値を入力 (種別)</label>
            <!-- nameを'type'に変更し、データベースのカラム名と一致させる -->
            <input type="number" id="type" name="type" value="{{ old('type') }}" placeholder="数値を入力" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        
        <button type="submit" class="bg-pink-500 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            送信ボタン
        </button>
    </form>
</div>
@endsection
