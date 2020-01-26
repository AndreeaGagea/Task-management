<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Project;
use App\Task;
use App\User;
use Carbon\Carbon;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users =  User::all() ; 
        $tasks  = Task::orderBy('name','ASC')->paginate(9);
        return view('task.index')->with('tasks', $tasks) 
                                 ->with('users', $users )
                                 ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function sort( $key ) {
        $users = User::all();
        switch($key) {
            case 'task':
                $tasks = Task::orderBy('task')->paginate(10); 
            break;
            case 'completed':
                $tasks = Task::orderBy('completed')->paginate(10);
            break;
        }
        return view('task.index')->with('users', $users)
                                 ->with('tasks', $tasks) ;
    }

     public function completed($id)
    {
        $task_complete = Task::find($id) ;
        $task_complete->completed = 1;
        $task_complete->save() ;
        return redirect()->back();
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Project::all();
        $users = User::all();
        return view('task.create')->with('projects', $projects) 
                                  ->with('users', $users) ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate ($request,[
            'name' => 'required',
            'project_id' => 'required',
            'due_date' => 'required'
            
        ]);



        $task = Task::create([

        'project_id' => $request->project_id,
        'name' => $request->name,
        'user_id' => $request->user,
        'due_date' => $request->due_date

        
      ]);
        
      return redirect()->route('task.show',compact('tasks'))->with('success', 'Your task added successfully!'); ; 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $task = Task::find($id); 
         $projects = Project::all();
         $users = User::all();

         return view('task.edit')->with('task', $task)
                                 ->with('projects', $projects ) 
                                 ->with('users', $users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
    'name' => 'required',
    'project_id' => 'required'
    ]);
    Task::find($id)->update($request->all());
    return redirect()->route('task.show')->with('success','Task updated successfully');
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Task::find($id)->delete();
        return redirect()->back()->with('success','Task removed successfully');
    }

    public function tasklist($projectid) {

        $users =  User::all() ;
        $project_name = Project::find($projectid) ;
        $task_list = Task::where('project_id','=' , $projectid)->get();
        return view('task.list')->with('users', $users) 
                                 ->with('project_name', $project_name)
                                 ->with('task_list', $task_list) ;
    }
}
