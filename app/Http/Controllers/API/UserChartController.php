<?php

namespace App\Http\Controllers\API;

use App\Filters\UserChartFilter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserChartResource;
use App\Http\Resources\UserChartCollection;
use App\Http\Requests\UserChartUpdateRequest;

class UserChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $filter = new UserChartFilter();
        $queryItems = $filter->transform($request);

        if(count($queryItems) == 0){
            return new UserChartCollection(User::paginate());
        }
        else{
            $userCharts = User::where($queryItems)->paginate();
            return new UserChartCollection($userCharts->appends($request->query()));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserChartUpdateRequest $request, User $user)
    {
        $user->update($request->getData());
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
