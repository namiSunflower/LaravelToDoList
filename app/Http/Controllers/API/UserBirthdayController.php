<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserBirthdayUpdateRequest;
use App\Http\Resources\UserBirthdayResource;
use App\Http\Resources\UserBirthdayCollection;

class UserBirthdayController extends Controller
{
    //
    public function api()
    { 
        return new UserBirthdayCollection(User::all());
    }

    public function index(){
        return view('axios-api.index');
    }

    
    public function edit(User $user)
    {
        return view('axios-api.edit')->with(compact(['user']));
    }

    public function api_show(User $user)
    {
        return new UserBirthdayResource($user);
    }

    public function show(User $user){
        return view('axios-api.show')->with(compact(['user']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserBirthdayUpdateRequest $request, User $user)
    {
        return $user->update($request->getData());
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
    }
}
