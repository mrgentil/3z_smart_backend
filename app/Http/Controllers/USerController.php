<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Gender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class USerController extends Controller
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
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::all();
        $genders = Gender::all();

        return view('user.create', compact('roles', 'genders'));
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
        $data = $request->validate([
            'name' => 'required|string',
            'firstName' => 'required|string',
            'lastNAme' => 'required|string',
            'adress' => 'required|string',
            'phone' => 'required|string',
            'gender_id' => 'required|exists:genders,id',
            'avatar' => 'image|mimes:jpeg,png,jpg',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|min:6',
            'role_id' => 'required|exists:roles,id',


        ]);

        $filename = $this->move($request->file('avatar'));
        try {
            $data['avatar'] = $filename;
            $data['password'] = Hash::make($data['password']);
            $user = User::create($data);
            Alert::success('Félicitations', 'Utilisateur  Ajouté avec Succès');
            return redirect()->route('users.index');
        } catch (\Throwable $th) {
            throw $th;
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
        $users = User::findOrFail($id);
        return view('user.show', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        $users = User::find($user->id);
        $roles = ROle::all();
        $genders = Gender::all();

        return view('user.edit', compact('roles', 'genders', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $data = $request->validate([
            'name' => 'string',
            'firstName' => 'string',
            'lastNAme' => 'string',
            'adress' => 'string',
            'phone' => 'string',
            'gender_id' => 'exists:genders,id',
            'avatar' => 'image|mimes:jpeg,png,jpg|nullable',
            'email' => 'string|email|',
            'password' => 'min:6|nullable',
            'role_id' => 'exists:roles,id',
        ]);



        if (isset($date['password'])) {
            $data['password'] = Hash::make($data['password']);
            $user->update([
                'password' => $data['password']
            ]);
        }
        if (isset($date['avatar'])) {

            $filename = $this->move($request->file('avatar'));
            $data['avatar'] = $filename;
            $user->update([
                'avatar' => $data['avatar']
            ]);
        }



        $user->update([
            'name' => $data['name'],
            'firstName' => $data['firstName'],
            'lastNAme' => $data['lastNAme'],
            'phone' => $data['phone'],
            'adress' => $data['adress'],
            'gender_id' => $data['gender_id'],
            'role_id' => $data['role_id'],
            'email' => $data['email'],

        ]);
        Alert::success('Félicitations', 'Utilisateur  Modifié avec Succès');
        try {
            return redirect()->route('users.index');
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
    public function destroy(User $user)
    {
        //
        $user->delete();
        Alert::success('Félicitations', 'Utilsateur  Supprimé avec Succès');
        return redirect()->back();
    }

    private function move($avatar)
    {
        $originalImage = $avatar;
        //$filename = time() . '-' . $originalImage->getClientOriginalName();
        $filename = uniqid() . $originalImage->getClientOriginalName() . '.' . $originalImage->getClientOriginalExtension();
        $thumbnailImage = Image::make($originalImage);

        $lgPath = public_path() . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'avatar' . DIRECTORY_SEPARATOR . 'lg' . DIRECTORY_SEPARATOR;
        $smPath = public_path() . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'avatar' . DIRECTORY_SEPARATOR . 'sm' . DIRECTORY_SEPARATOR;
        $xsPath = public_path() . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'avatar' . DIRECTORY_SEPARATOR . 'xs' . DIRECTORY_SEPARATOR;


        $thumbnailImage->resize(590, 590);
        $thumbnailImage->save($lgPath . $filename);
        $thumbnailImage->resize(90, 90);
        $thumbnailImage->save($smPath . $filename);
        $thumbnailImage->resize(45, 45);
        $thumbnailImage->save($xsPath . $filename);

        return $filename;
    }
}
