<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\TaskUpdateRequest;
use App\Http\Requests\UserUpdateRequest;

class HomeController extends Controller
{
     /**
     * Show Admin Dashboard.
     * 
     * @return \Illuminate\Http\Response
     */
    // public function index(){
    //     return view('admin.home');
    // }
    public function index()
    {
        //Only show tasks by user who is logged in
        $name = auth()->user()->name;
        $users = User::latest()->take(5)->get();

        //chaining them for now
        // return view('tasks.index')->with('tasks', $tasks)->with('name', $name);
        return view('admin.dashboard')->with(compact(['name', 'users']));
    }

    public function allUsers()
    {
        //Only show tasks by user who is logged in
        $users = User::all();
        // return dd($users);
        //chaining them for now
        // return view('tasks.index')->with('tasks', $tasks)->with('name', $name);
        return view('admin.user.allUsers')->with(compact(['users']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // $task = Task::find($id);
        // return $task;
        $tasks = $user->tasks;

        return view('admin.user.edit')->with(compact(['user', 'tasks']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        //
        // if (count($request->all())){
        //     return redirect()->route('admin.home', $user)->withErrors('Cannot leave fields empty!');
        // }
        $user->name = $request->input('name');
        if($request->email != $user->email){
            $user->email = $request->input('email');
        }
        if(isset($user->password)){
            $user->password= bcrypt($request->password);
        }
        // $password = $request->input('password');
        // $hashedPassword = Hash::make('password');
        // $user->password= $hashedPassword;
        $user->save();
        // return redirect('tasks')->with('success', 'Stock updated.');
        return redirect()->route('admin.home', $user)->with('success', 'User updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        $user->delete();
        // return redirect('/tasks')->with('success', 'Task removed.'); 
        return redirect()->route('admin.home', $user)->with('success', 'User has been successfully deleted!');
    }

    // public function allTasks(User $user){
    //     $tasks = $user->tasks->all();
    //     return view('admin.user.edit')->with(compact(['tasks']));
    // }
}
