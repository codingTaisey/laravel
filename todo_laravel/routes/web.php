<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\QuizController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*
【作成方法】デフォルトで用意されている
【役割】あるURLにアクセスがあった場合に、どのコントローラーのどのメソッドを実行するかを定義する
※ルーティングの定義がないと、、URLにアクセスしても処理が実行されないので、Lravelでは最初に設定する
ルーティングとは、URLとコントローラーのメソッドを紐づける役割を持つ。
web.phpとは、Webルートを定義するためのファイルであり、ユーザーがブラウザを通じてアクセスするURLに対応する処理を指定します。
例：URLを「http://localhost:8000/」とした場合、Route::get('/', function (　　) { return view('welcome'); });の部分が実行される。
これは、ルートが「/」にアクセスされたときに、welcomeビューを返すことを意味します。
view('welcome')が何をしているかというと、resources/views/welcome.blade.phpというテンプレートファイルを表示しています。
テンプレートファイルとは、HTMLの雛形のようなもので、動的に内容を変更できる部分を含むことができます。
例えば、ユーザーの名前を表示したり、データベースから取得した情報を表示したりすることができます。
view関数は、指定されたテンプレートファイルをレンダリングし、その結果をブラウザに返します。
レンダリングとは、テンプレートファイルを実際のHTMLに変換するプロセスのことです。
テンプレートファイルとHTMLの違いは、テンプレートファイルには動的な部分が含まれている点です。例えば、{{ $name }}のような記述があり、これは変数$nameの値に置き換えられます。
このように、web.phpファイルを使ってURLと処理を紐づけることで、ユーザーが特定のURLにアクセスしたときに、適切なビューやコントローラーのメソッドが実行されるようになります。
*/


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
// 以下のコードは、ユーザー認証に関連するルートを自動的に生成します。
// ルートとは、特定のURLにアクセスしたときに実行される処理を定義するものです。
// これには、ログイン、登録、パスワードリセットなどの機能が含まれます。
// これにより、開発者はこれらの基本的な認証機能を一から実装する必要がなくなり、迅速にアプリケーションを構築できます。
// Auth::routes()は、Laravelの認証システムを簡単にセットアップするための便利なメソッドです。
// これにより、ユーザー認証に必要なすべてのルートが自動的に生成されます。
// 例えば、ログインページへのアクセス、ユーザー登録、パスワードリセットなどのルートが含まれます。
// これにより、開発者はこれらの基本的な認証機能を一から実装する必要がなくなり、迅速にアプリケーションを構築できます。
// 例えば、Auth::routes()を使用すると、以下のようなルートが自動的に生成されます。
// - GET /login: ログインフォームを表示
// - POST /login: ログイン処理を実行
// - GET /register: ユーザー登録フォームを表示
// - POST /register: ユーザー登録処理を実行
// - POST /logout: ログアウト処理を実行
// - GET /password/reset: パスワードリセットフォームを表示
// - POST /password/email: パスワードリセットリンクをメールで送信
// - GET /password/reset/{token}: パスワードリセットフォームを表示（トークン付き）
// - POST /password/reset: パスワードリセット処理を実行
// これらのルートは、Laravelの認証システムを利用するために必要な基本的な機能を提供します。
// 開発者は、これらのルートをカスタマイズしたり、追加の認証機能を実装したりすることもできますが、Auth::routes()を使用することで、基本的な認証機能を迅速にセットアップできます。     

// 以下の処理は、ユーザーが「/home」というURLにアクセスしたときに、HomeControllerのindexメソッドを実行するように設定しています。
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/tasks', [App\Http\Controllers\TaskController::class, 'index']);
Route::post('/create', [App\Http\Controllers\TaskController::class, 'create']);
Route::delete('/delete/{taskId}', [App\Http\Controllers\TaskController::class, 'delete']);


Route::get('/quiz', function () {
    return view('quiz');
});

Route::get('/quiz2', [QuizController::class, 'index']);

// quiz3にアクセスしたらQuizControllerのshow関数を実行
Route::get('/quiz3', [QuizController::class, 'show']);

Route::get('/quiz4', [QuizController::class, 'quiz4_show']);
Route::get('/quiz5', [QuizController::class, 'login']);
Route::get('/quiz6', [QuizController::class, 'quiz6_show'])->name('quiz6_test');
Route::get('/quiz7', [QuizController::class, 'quiz7_show']);
Route::get('/quiz8', [QuizController::class, 'quiz8_redirect']);
Route::get('/quiz9/{id}', [QuizController::class, 'quiz9_show'])->name('quiz9_test');
Route::get('/quiz10', [QuizController::class, 'quiz10_show'])->name('quiz10_test');
Route::post('/quiz10/store', [QuizController::class, 'quiz10_store'])->name('quiz10_test2');
Route::get('/quiz11/all', [QuizController::class, 'quiz11_show_all']);
Route::get('/quiz11/get', [QuizController::class, 'quiz11_show_get']);
Route::get('/quiz12/{id}', [QuizController::class, 'quiz12_show'])->name('quiz12_test');
Route::post('/quiz12/update/{id}', [QuizController::class, 'quiz12_update']);
Route::get('/quiz12/delete/{id}', [QuizController::class, 'quiz12_delete'])->name('quiz12_test3');