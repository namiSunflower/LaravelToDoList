<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserUpdateRequest;

class HomeController extends Controller
{
     /**
     * Show Admin Dashboard.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $name = auth()->user()->name;
        $users = User::latest()->take(5)->get();

        return view('admin.dashboard')->with(compact(['name', 'users']));
    }

    public function allUsers()
    {
        $users = User::all();
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
        // $user->name = $request->input('name');
        // if($request->email != $user->email){
        //     $user->email = $request->input('email');
        // }
        // if(isset($user->password)){
        //     $user->password= bcrypt($request->password);
        // }
        
        // $user->save();
        $user->update($request->getData($user));
        // $user->update($request ->getData());
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
        $user->delete();
        return redirect()->route('admin.home', $user)->with('success', 'User has been successfully deleted!');
    }

}
