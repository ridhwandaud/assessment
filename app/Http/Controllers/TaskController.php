<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

class TaskController extends Controller
{
    public function index($id)
    {
        return view('task.index', compact('id'));
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $id = $input['workspace_id'];

        $task = new Task;

        $task->name = $input['name'];

        $task->workspace_id = $id;

        $task->deadline = $input['deadline'];

        $task->save();

        return redirect('workspace/'.$id);

    }

    public function update($id)
    {
        $task = Task::where('id', $id)->first();

        if($task->complete)
        {
            $task->complete = false;
            $task->completed_at = null;
            $task->save();
        } else 
        {
            $task->complete = true;
            $task->completed_at = now();
            $task->save();
        }

        return back();
       
    }
}
