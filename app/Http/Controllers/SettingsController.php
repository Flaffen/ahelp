<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        return view('settings.index');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'email' => 'email|unique:users',
            'tel' => 'max:11|unique:users',
            'old_password' => 'max:65',
            'new_password' => 'max:65'
        ], [
            'email.unique' => 'Такой Email уже зарегестрирован!',
            'tel.unique' => 'Такой номер телефона уже зарегестрирован!',
            'tel.max' => 'Максимальная длинна номера телефона - 11 символов!'
        ]);

        if ($request->has('email'))
        {
            $request->user()->email = $request->email;
            $request->user()->save();
        }

        if ($request->has('tel'))
        {
            $request->user()->tel = $request->tel;
            $request->user()->save();
        }

        if ($request->has('old_password') && $request->has('new_password'))
        {
            if (Hash::check($request->old_password, $request->user()->password))
            {
                $request->user()->password = bcrypt($request->new_password);
                $request->user()->save();
            }
        }

        if ($request->hasFile('photo') && $request->photo->isValid())
        {
            $new_photo = str_random(6) . '.png';

            if ($request->user()->img && $request->user()->img !== 'default.png')
            {
                Storage::delete('public/user_images/' . $request->user()->img);
            }

            $request->user()->img = $new_photo;
            $request->user()->save();
            $request->photo->storeAs('public/user_images', $new_photo);
        }

        return back()->with('status', 'Насторйки успешно сохранены!');
    }
}
