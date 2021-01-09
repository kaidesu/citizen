<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function update(Request $request)
    {
        $user           = auth()->user();
        $password       = $request->get('password');
        $rules['email'] = 'required';

        if ($password) {
            $rules['password']              = 'required|min:8';
            $rules['password_confirmation'] = 'min:8|same:password';
        }

        $this->validate($request, $rules);

        $user->email = $request->get('email');

        if (! empty($password)) {
            $user->password = bcrypt($request->get('password'));
        }

        $user->save();

        return redirect()->back()->withInput()->with([
            'flash' => [
                'level' => 'success',
                'message' => 'Your account settings have been updated.',
            ],
        ]);
    }
}