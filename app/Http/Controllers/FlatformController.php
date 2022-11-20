<?php

namespace App\Http\Controllers;

use App\Trait\ApiResponse;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class FlatformController extends Controller
{
    use ApiResponse;
    function generateUrl($flatform)
    {
        switch ($flatform) {
            case 'facebook':
                return Socialite::driver('facebook')->redirect();
                break;
            case 'google':
                return Socialite::driver('google')->redirect();
                break;
            case 'github':
                return Socialite::driver('github')->redirect();
                break;
            case 'gitlab':
                return Socialite::driver('gitlab')->redirect();
                break;
            case 'linkedin':
                return Socialite::driver('linkedin')->redirect();
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
                case 'facebook':
                    $user = Socialite::driver('facebook')->user();
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
                case 'google':
                    $user = Socialite::driver('google')->user();
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
                case 'github':
                    $user = Socialite::driver('github')->user();
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
                case 'gitlab':
                    $user = Socialite::driver('gitlab')->user();
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
                case 'linkedin':
                    $user = Socialite::driver('linkedin')->user();
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


            return $this->apiResponse($data);
        } catch (\Exception $e) {
            return $this->apiResponse([], 'error', false);
        }
    }
}
