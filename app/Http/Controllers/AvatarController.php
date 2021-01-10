<?php

namespace App\Http\Controllers;

use DB;
use App\Models\User;
use Illuminate\Http\Request;

class AvatarController extends Controller
{
    public function show($hash)
    {

        try {
            $user = User::where(DB::raw('md5(email)'), $hash)->firstOrFail();
        } catch (\Exception $e) {
            return abort(404);
        }

        $avatar = $this->generateAvatar($user->letter);

        return response()->stream(function() use ($avatar) {
            imagepng($avatar);
            imagedestroy($avatar);
        }, 200, [
            'Content-Type' => 'image/png',
        ]);
    }

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

    protected function generateAvatar($text = '')
    {
        $width    = 500;
        $height   = 500;
        $font     = resource_path('fonts/Roboto-Bold.ttf');
        $fontSize = 160;
        $image    = @imagecreate($width, $height) or die('Cannot initialize new GD image stream');

        imagecolorallocate($image, 229, 231, 235);

        $fontColor       = imagecolorallocate($image, 75, 85, 99);
        $textBoundingBox = imagettfbbox($fontSize, 0, $font, $text);

        $x = abs(ceil(($width - $textBoundingBox[2]) / 2));
        $y = abs(ceil(($height - $textBoundingBox[5]) / 2));

        imagettftext($image, $fontSize, 0, $x, $y, $fontColor, $font, $text);

        return $image;
    }
}