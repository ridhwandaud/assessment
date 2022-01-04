<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Workspace;
use App\Models\Task;



class WorkspaceController extends Controller
{
    public function index()
    {

        return view('workspace.index');
    }

    public function store(Request $request)
    {

        $input = $request->all();

        $user = Auth::user();

        $task = $user->workspaces()->create([
	    	'name' => $input['name']
	  	]);

        return redirect()->route('home');
    }

    public function show($id)
    {
        $user = Auth::user();
        
        $workspace = Workspace::where('id', $id)->first();

        if(Gate::allows('view-workspace', $workspace)){
            $tasks = Task::where('workspace_id', $id)->get();
            return view('workspace.show', [
                'id' => $id,
                'tasks' => $tasks
            ]);
        } else {
            abort('403');
        }

    }
}
