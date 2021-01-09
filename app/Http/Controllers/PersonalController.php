<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonalController extends Controller
{
    /**
     * Update the user's avatar.
     */
    public function update(Request $request)
    {
        $user          = auth()->user();
        $rules['name'] = 'required';

        $this->validate($request, $rules);

        $user->update($request->all());

        return redirect()->back()->withInput()->with([
            'flash' => [
                'level'   => 'success',
                'message' => 'Your personal information has been updated.',
            ],
        ]);
    }
}