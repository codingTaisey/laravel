<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;

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
}
