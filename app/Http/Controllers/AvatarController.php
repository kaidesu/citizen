<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AvatarController extends Controller
{
    /**
     * Update the user's avatar.
     */
    public function update(Request $request)
    {
        $user            = auth()->user();
        $rules['avatar'] = 'required|image';

        $this->validate($request, $rules);

        $user->avatar = $request->file('avatar')->store('avatars', 'public');
        $user->save();

        return redirect()->back()->withInput()->with([
            'flash' => [
                'level'   => 'success',
                'message' => 'Your avatar has been updated.',
            ],
        ]);
    }
}