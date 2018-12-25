<?php

namespace App\Http\Controllers;

use App\Classes\MyHttpResponse;
use App\User;
use App\UserGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:web', 'can:isAdmin']);
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

        try {
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
            return MyHttpResponse::storeResponse(true, 'User Successfully Created', 'user.index');
        } catch (\Exception $e) {
            return MyHttpResponse::storeResponse(false, $e->getMessage(), 'user.index');
        }
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

        try {
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
            return MyHttpResponse::updateResponse(true, 'User Successfully Updated', 'user.show', $user->id);
        } catch (\Exception $e) {
            return MyHttpResponse::updateResponse(false, $e->getMessage(), 'user.show', $user->id);
        }
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
        try {
            $user->delete();
            return MyHttpResponse::deleteResponse(true, 'User Successfully Deleted', 'user.index');
        } catch (\Exception $e) {
            return MyHttpResponse::deleteResponse(false, $e->getMessage(), 'user.index');
        }
    }
}
