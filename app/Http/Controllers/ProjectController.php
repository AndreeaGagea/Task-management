<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Project;
use App\User;
use App\Task;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $users = User::all();

        $projects = Project::orderBy('name','ASC')->paginate(10);
return view('projects.list',compact('projects'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //get all users role - user (0)
        $users = User::all();

        return view('projects.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
    'name' => 'required',
    'description' => 'required',
    'duedate' =>'required',
    ]);
    Project::create($request->all());
        return redirect()->route('projects.index',compact('projects'))->with('success', 'Your project added successfully!');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
        public function show(Project $project, $id)
    {
        $users = User::all();
        $project = Project::find($id);
return view('projects.show',compact('project', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $users = User::all();
        $project = Project::find($id);
    return view('projects.edit', compact('users','project'
));
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
    'description' => 'required'
    ]);
    Project::find($id)->update($request->all());
    return redirect()->route('projects.index')->with('success','Project updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Project::find($id)->delete();
    return redirect()->route('projects.index')->with('success','Project removed successfully');
    }

    
}
