<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class FlatformController extends Controller
{

    function generateUrl($flatform)
    {
        switch ($flatform) {
            case 'facebook' || 'google' || 'github' || 'gitlab' || 'linkedin' || 'twitter':
                return Socialite::driver($flatform)->redirect();
                break;
            default:
                return 'flatform not support';
        }
    }
    function auth($flatform, Request $request)
    {
        try {

            $data = [];
            switch ($flatform) {
                case 'facebook' || 'google' || 'github' || 'gitlab' || 'linkedin' || 'twitter':
                    $user = Socialite::driver($flatform)->user();
                    $data = [
                        'flatform' => $flatform,
                        'id' => $user->getId(),
                        'nickName' => $user->getNickname(),
                        'name' => $user->getName(),
                        'email' => $user->getEmail(),
                        'avatar' => $user->getAvatar(),
                        'token' => $user->token,
                        'refresh_token' => $user->refreshToken,
                        'expiresIn' => $user->expiresIn
                    ];
                    break;
                default:
                    return 'flatform not support';
            }


            return response()->json([
                'status' => true,
                'message' => 'data',
                'data' => $data
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'error',
                'data' => []
            ]);
        }
    }
}
