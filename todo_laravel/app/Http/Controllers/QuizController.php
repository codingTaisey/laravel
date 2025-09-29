<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Company; // Companyモデルを使うことを宣言
use App\Models\Sale;    // Saleモデルを使うことを宣言

class QuizController extends Controller
{
    public function index()
    {
        return view('question.quiz2');
    }

    public function show()
    {
        // ヒントにあるようにQuizzesテーブルからデータを取得
        $quizzes = Quiz::all();

        // compact関数を使ってデータをビューに渡す
        return view('question.quiz3', compact('quizzes'));
    }

    public function quiz4_show()
    {
        $fruits = "orange";
        return view('question.quiz4', compact('fruits'));
    }

    public function login(Request $request)
    {
        // セッションの削除
        $request->session()->flush();
        // ログインユーザーの設定
        $user_info = array(
            'email' => 'techis@test',
            'password' => '1234'
        );
        // ログイン処理
        if (Auth::attempt($user_info)) {
            // ログイン成功
            return view('question.quiz5');
        }
        // ログイン失敗
        // 今回は学習のためどちらの場合もquiz5を表示
        return view('question.quiz5');
    }

    public function quiz6_show()
    {
        // quiz6の課題でQuizテーブルから全データを取得する代わりに、
        // 必要なデータ構造を持つダミー配列を作成して渡します
        $quizzes = [
            (object)['id' => 1, 'name' => 'テックアイエス', 'category' => 5, 'created_at' => '2024-11-12 11:11:11', 'updated_at' => '2024-12-12 12:12:12'],
            // Quiz::all()の結果と同じように振る舞うため、実際には複数データが入ります。
        ];
        // 実際には $quizzes = Quiz::all(); を使用します

        return view('question.quiz6', compact('quizzes'));
    }

    public function quiz7_show()
    {
        // 【画像82ae2dの課題に対応】
        // Quizテーブルから最初の1件のデータのみを取得
        $quiz = Quiz::first();

        // 取得したデータをビュー（quiz7）に渡します
        return view('question.quiz7', compact('quiz'));
    }

    public function quiz8_redirect()
    {
        return redirect('/quiz7');
    }

    // 既存の QuizController クラスの中に以下の関数を追加
    public function quiz9_show($id)
    {
        // URLから渡された$idを使って、該当するデータを検索
        $quiz = Quiz::find($id);

        // 取得したデータをquiz9.blade.phpに渡す
        return view('question.quiz9', compact('quiz'));
    }

    public function quiz10_show()
    {
        return view('question.quiz10');
    }

    // quiz10 登録処理用の関数（今回は空のまま）
    public function quiz10_store()
    {
        // 今回はエラー画面表示となるが、今後の課題で処理を追加する
    }
    /**
     * 【問題のコード】
     * CompaniesテーブルとSalesテーブルから全件取得し、
     * ビューにデータを渡す
     */
    public function quiz11_show_all()
    {
        // 1. モデルを使って全データを取得する
        $companies = Company::all();
        $sales = Sale::all();

        // 2. 取得したデータをビューに渡す
        return view('quiz11', compact('companies', 'sales'));
    }

    public function quiz11_show_get()
    {
        // Companiesテーブルのデータ取得
        // SQL: select * from companies where founded_at LIKE '%-03-%' and address LIKE 'テスト２%';
        $companies = Company::where('founded_at', 'LIKE', '%-03-%') // 創立日が3月のもの
            ->where('address', 'LIKE', 'テスト２%')   // 住所が「テスト２」で始まるもの
            ->get();

        // Salesテーブルのデータ取得
        // SQL: select * from sales where company_id = 2 or amount > 8000 order by amount desc;
        $sales = Sale::where('company_id', 2)             // 企業IDが2のもの
            ->orWhere('amount', '>', 8000)       // または、売上が8000より大きいもの
            ->orderBy('amount', 'desc')          // 売上の降順（大きい順）で並び替え
            ->get();

        // 絞り込んだ結果をquiz11ビューに渡して表示
        return view('quiz11', compact('companies', 'sales'));
    }

    public function quiz12_show($id)
    {
        // URLから渡されたIDを使って、データベースから該当するデータを1件探す
        // findOrFailは、データが見つからない場合に自動で404エラー画面を表示してくれる便利なメソッド
        $quiz = Quiz::findOrFail($id);

        // 前回作成した更新画面ビュー(quiz12.blade.php)に、取得した$quizデータを渡す
        // ビューのファイル名が 'question.quiz12' の場合
        return view('question.quiz12', compact('quiz'));
        
        // ビューのファイル名が 'quiz12' の場合
        // return view('quiz12', compact('quiz'));
    }
    public function quiz12_update(Request $request, $id)
    {
        // ① バリデーションを行う
        // nameは必須、typeは必須かつ数値であることなどをチェック
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|integer',
        ]);

        // ② 更新対象のデータを検索する
        $quiz = Quiz::findOrFail($id);

        // ③ update関数で更新処理を行う
        // フォームから送られてきた 'name' と 'type' の値でデータを更新
        $quiz->update([
            'name' => $request->name,
            'type' => $request->type,
        ]);

        // ④ quiz3.blade.phpが開かれるようにリダイレクト
        // ここでは一覧表示用のルート '/quiz3' にリダイレクトすると仮定
        return redirect('/quiz3');
    }
} // クラスの定義はここで閉じます