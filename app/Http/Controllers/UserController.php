<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Validator;
use App\Project;
use App\Task;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate(request(),[

            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'city' => $request->city,
            'admin' => isset($request->admin) ? 1 : 0,
            'password' => bcrypt($request->password),
        ]);
        return back();
        
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
    public function edit(user $user)
    {
        return view('users.edit', compact('user'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $user)
    {
        $this->validate(request(),[

            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
         
        $user->update([

            'name' => $request->name,
            'email' => $request->email,
            'city' => $request->city,
            'phone_number' => $request->phone_number,
            'admin' => ($request->admin) ? 1 : 0,
            'password' => bcrypt($request->password),
        ]);
        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        $user->delete();
        return back();
    }

    public function userTaskList($id) {

        $name = User::find($id) ;
        $task_list = Task::where('user_id','=' , $id)->get();

        return view('users.list', compact('task_list', 'name') ) ;
    }
}
