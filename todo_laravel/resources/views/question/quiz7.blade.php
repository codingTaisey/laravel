@extends('common.main')

@section('body')
<div class="row">
    <div class="col-md-8 offset-md-2">
        
        <p><a href="{{ url('/quiz6') }}">quiz6の画面にurl関数で移動する</a></p>
        <p><a href="{{ route('quiz6_test') }}">quiz6の画面にroute関数で移動する</a></p>
        <p><a href="{{ url('quiz9/' . $quiz->id) }}">quiz9の画面にurl関数で移動する</a></p>
        <p><a href="{{ route('quiz9_test', ['id' => $quiz->id]) }}">quiz9の画面にroute関数で移動する</a></p>

        <hr class="my-4">
        
        
        <form action="{{ url('quiz9/' . $quiz->id) }}" method="post" class="mt-4">
            <!-- CSRF対策のため、LaravelではPOSTフォームに必須の記述です -->
            @csrf
            
            <p>quiz9の画面にurl関数で移動する（formタグ）</p>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                送信ボタン
            </button>
        </form>
    </div>
</div>
@endsection
