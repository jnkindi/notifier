<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Request;

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
        return UserResource::collection($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->input('name');
        // By default a new user has default rate limit
        $user->rate_limit = 0;
        $user->month_quota = $request->input('month_quota') ? $request->input('month_quota') : 0;
        $user->save();
        return new UserResource($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        // $user = User::; //id comes from route
        if( $user ){
            return new UserResource($user);
        }
        return "User Not found"; // temporary error
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
        $user = User::find($id);
        if($request->input('rate_limit')) {
            // Rate limit, user enters requests/second and we convert them in total requests in a minute
            $user->rate_limit = $request->input('rate_limit')*60;
        }
        if($request->input('month_quota')) {
            $user->month_quota = $request->input('month_quota');
        }
        $user->save();
        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrfail($id);
        if($user->delete()){
            return  new UserResource($user);
        }
        return "Error while deleting";
    }
}
