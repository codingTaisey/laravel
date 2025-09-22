<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    // テーブル名を明示的に指定（クイズテーブルの場合）
    protected $table = 'quizzes'; 

    // 複数代入を許可するカラムを指定
    protected $fillable = [
        'name',
        'type',
        'question',
        'answer',
    ];

}