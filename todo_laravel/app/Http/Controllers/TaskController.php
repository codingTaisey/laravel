<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;

class TaskController extends Controller
{
    /**
     * コンストラクタ
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * タスク一覧
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        //$tasks = Task::orderBy('created_at', 'asc')->get();
        $tasks = $request->user()->tasks()->get();
        return view('tasks.index', [
            'tasks' => $tasks,
        ]);
    }

    /**
     * タスク登録
     *
     * @param Request $request
     * @return Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        // タスク作成
        $request->user()->tasks()->create([
            'name' => $request->name,
        ]);

        return redirect('/tasks');
    }

    /**
     * タスク削除
     *
     * @param Request $request
     * @param Task $task
     * @return Response
     */
    public function delete($taskId)
    {
        $task = Task::findOrFail($taskId);
        $this->authorize('delete', $task);
        $task->delete();


        return redirect('/tasks');
    }
}
