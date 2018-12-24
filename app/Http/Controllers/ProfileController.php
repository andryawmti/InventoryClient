<?php

namespace App\Http\Controllers;

use App\Classes\MyHttpResponse;
use App\Rules\ValidatePassword;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function index()
    {
        return view('partials.profile');
    }

    public function profileUpdate(User $user)
    {
        try {
            request()->validate([
                'first_name' => ['required'],
                'last_name' => ['required'],
                'email' => ['required', 'email'],
                'phone' =>  ['required'],
                'address' => ['required'],
            ]);

            $user->first_name = request('first_name');
            $user->last_name = request('last_name');
            $user->email = request('email');
            $user->phone = request('phone');
            if (request()->hasFile('photo')) {
                $path = Storage::putFile('public/profile_images', request()->file('photo'));
                $url = Storage::url($path);
                $user->photo = $url;
            }
            $user->address = request('address');
            $user->save();
            return MyHttpResponse::updateResponse(true, 'Profile Successfully Updated', 'profile');
        } catch (\Exception $e) {
            return MyHttpResponse::updateResponse(false, $e->getMessage(), 'home');
        }
    }

    public function changePassword(User $user)
    {
        request()->validate([
            'current_password' => ['required', new ValidatePassword($user)],
            'new_password' => ['required', 'min:6', 'max:35', 'confirmed'],
            'new_password_confirmation' => ['required']
        ]);

        try {
            $user->password = Hash::make(request('new_password'));
            $user->save();
            return MyHttpResponse::updateResponse(true, 'Password Successfully Updated', 'profile');
        } catch (\Exception $e) {
            return MyHttpResponse::updateResponse(false, $e->getMessage(), 'profile');
        }
    }
}
