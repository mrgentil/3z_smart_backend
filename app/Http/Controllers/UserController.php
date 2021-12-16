<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UserResource;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::paginate(10);
        return new UserResource($users);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = validator::make($request->all(), [
            'name' => 'required|string',
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'adress' => 'required|string',
            'phone' => 'required|string',
            'genre' => 'required|string',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|min:6',
            'permission_id' => 'required|exists:permissions,id',


        ]);
        if ($validator->fails()) {
            return response()->json([
                'validation_errors' => $validator->messages()
            ]);
        } else {
            $user = User::create([
                'name' => $request->name,
                'firstName' => $request->firstName,
                'lastName' => $request->lastName,
                'adress' => $request->adress,
                'phone' => $request->phone,
                'genre' => $request->genre,
                'permission_id' => $request->permission_id,
                'email' => $request->email,
                'password' => hash::make($request->password),

            ]);
            $token = $user->createToken($user->email . '_Token')->plainTextToken;

            return response()->json([
                'status' => '200',
                'username' => $user->name,
                'email' => $user->email,
                'token' => $token,
                'message' => 'User Successfully',
            ]);
        }
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
        $user = User::findOrFail($id);
        return new UserResource($user);
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
        //
        /* $validator = validator::make($request->all(), [
            'name' => 'required|string',
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'adress' => 'required|string',
            'phone' => 'required|string',
            'genre' => 'required|string',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|min:6',
            'permission_id' => 'required|exists:permissions,id',


        ]);
        if ($validator->fails()) {
            return response()->json([
                'validation_errors' => $validator->messages()
            ]);
        } else {
            $user = User::findOrFail($id);
            $user->name = $request->name;
            $user->firstname =  $request->firstName;
            $user->lastname =  $request->lastName;
            $user->address =  $request->adress;
            $user->phone =  $request->phone;
            $user->genre =  $request->genre;
            $user->permission_id =   $request->permission_id;
            $user->email =  $request->email;
            $user->password =  hash::make($request->password);




            return response()->json([
                'status' => '200',
                'username' => $user->name,
                'email' => $user->email,

                'message' => 'Update Successfully',
            ]);
        } */
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->firstname =  $request->firstName;
        $user->lastname =  $request->lastName;
        $user->adress =  $request->adress;
        $user->phone =  $request->phone;
        $user->genre =  $request->genre;
        $user->permission_id =   $request->permission_id;
        $user->email =  $request->email;
        $user->password =  hash::make($request->password);
        if ($user->save()) {
            return new UserResource($user);
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
        $user = User::findOrFail($id);
        if ($user->delete()) {
            return new UserResource($user);
        }
    }
}
