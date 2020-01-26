<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Project;
use App\Task;
use App\User;

class DispatcherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        
        if (Auth::user()->admin == 0) {
            $userProjects['projects'] = Project::getProjectsByUser(Auth::user());
            //$userTasks['tasks'] = Project::all(); 
            return view('home', $userProjects);
        } 
        else 
        {
            $users['users'] = \App\User::all();
            $projects['projects'] = \App\Project::all();
            return view('adminhome', $users, $projects);
        }
        
    }

    public function getProject($id)
{
    $projects = \App\Project::findorfail($id); 
    return view('project')->with('project', $project);

}   

    
   
}
