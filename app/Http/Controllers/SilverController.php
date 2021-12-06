<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Silver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\SilverResource;
use Spatie\Permission\Models\Permission;

class SilverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $silvers = Silver::paginate(10);
        return new SilverResource($silvers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'name' => 'required|string',
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'adress' => 'required|string',
            'phone' => 'required|string',
            'genre' => 'required|string',

            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|min:6',
            'permission_id' => 'required|exists:permissions,id',
            'user_id' => 'required|exists:users,id',

        ]);


        try {

            $data['password'] = Hash::make($data['password']);
            $user = User::create($data);

            $permission = Permission::find($data['permission_id']);
            $user->givePermissionTo($permission->name);
            $data['user_id'] = $user->id;
            $silver = Silver::create($data);

            return response()->json([
                'status' => 200,
                'message' => 'Silver saved successfull'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }

        //
        /* $silver = new Silver();
        $silver->name = $request->name;
        $silver->firstName = $request->firstName;
        $silver->lastName = $request->lastName;
        $silver->adress = $request->adress;
        $silver->phone = $request->phone;
        $silver->genre = $request->genre;
        $silver->user_id = $request->user_id;
        $silver->permission_id = $request->permission_id;
        if ($silver->save()) {

            return response()->json([
                'status' => 200,
                'message' => 'Silver saved successfull'
            ]);
        } */
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
        $silver = Silver::findOrFail($id);
        return new SilverResource($silver);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Silver $silver)
    {
        //
        $data = $request->validate([
            'name' => 'required|string',
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'adress' => 'required|string',
            'phone' => 'required|string',
            'genre' => 'required|string',

            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|min:6',
            'permission_id' => 'required|exists:permissions,id',
            'user_id' => 'required|exists:users,id',

        ]);
        $silver->update($data);
        try {
            return response()->json([
                'status' => 200,
                'message' => 'Silver update successfull'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $silver = Silver::findOrFail($id);
        if ($silver->delete()) {
            return new SilverResource($silver);
        }
    }
}
