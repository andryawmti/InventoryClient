<?php

namespace App\Http\Controllers;

use App\User;
use App\UserGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $userGroups = UserGroup::all();
        return view('manage.user.user', ['users' => $users, 'user_groups' => $userGroups]);
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'user_group_id' => ['required'],
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6'],
            'phone' =>  ['required'],
            'address' => ['required'],
        ]);

        $user = new User();
        $user->user_group_id = request('user_group_id');
        $user->first_name = request('first_name');
        $user->last_name = request('last_name');
        $user->email = request('email');
        $user->password = Hash::make(request('password'));
        $user->phone = request('phone');
        if (request()->hasFile('photo')) {
            $path = Storage::putFile('public/profile_images', request()->file('photo'));
            $url = Storage::url($path);
            $user->photo = $url;
        }
        $user->address = request('address');
        $user->save();

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('manage.user.user_edit', ['user' => $user, 'user_groups' => UserGroup::all()]);
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
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function update(User $user)
    {
        request()->validate([
            'user_group_id' => ['required'],
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6'],
            'phone' =>  ['required'],
            'address' => ['required'],
        ]);

        $user->user_group_id = request('user_group_id');
        $user->first_name = request('first_name');
        $user->last_name = request('last_name');
        $user->email = request('email');
        if (request('password') != $user->password) {
            $user->password = Hash::make(request('password'));
        }
        $user->phone = request('phone');
        if (request()->hasFile('photo')) {
            $path = Storage::putFile('public/profile_images', request()->file('photo'));
            $url = Storage::url($path);
            $user->photo = $url;
        }
        $user->address = request('address');
        $user->save();

        return redirect()->route('user.show', ['id' => $user->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index');
    }
}
