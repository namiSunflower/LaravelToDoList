<?php

namespace App\Http\Controllers\API;

use App\Filters\UserChartFilter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserChartResource;
use App\Http\Resources\UserChartCollection;
use App\Http\Requests\UserChartUpdateRequest;
use App\Http\Requests\RegisterNewUserController;
use Psy\Readline\Userland;

class UserChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function api(Request $request)
    { 
        $filter = new UserChartFilter();
        $queryItems = $filter->transform($request);

        if(count($queryItems) == 0){
            return new UserChartCollection(User::paginate());
        }
        else{
            $userCharts = User::where($queryItems)->paginate();
            return new UserChartCollection($userCharts->appends($request->query()));;
        }
    }
    public function index(){
        return view('admin.api.index');
    }

    public function create()
    {
        return view('admin.api.create', [
            'title' => 'API User Creation',
            'registerRoute' => 'api.store'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterNewUserController $request)
    {
       return User::create($request->getData());    
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return new UserChartResource($user);
    }

    public function edit(User $user)
    {
        return view('admin.api.edit')->with(compact(['user']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserChartUpdateRequest $request, User $user)
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
