<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Facebook;
use App\Trait\ApiResponse;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class FlatformController extends Controller
{
    use ApiResponse;
    function generateUrl($flatform)
    {
        $data = ['flatform' => $flatform];
        switch ($flatform) {
            case 'facebook':
                $data['url'] = Socialite::driver('facebook')->redirect()->getTargetUrl();
                break;
            case 'google':
                $data['url'] = Socialite::driver('google')->redirect()->getTargetUrl();
                break;
            case 'github':
                $data['url'] = Socialite::driver('github')->redirect()->getTargetUrl();
                break;
            case 'gitlab':
                $data['url'] = Socialite::driver('gitlab')->redirect()->getTargetUrl();
                break;
            case 'linkedin':
                $data['url'] = Socialite::driver('linkedin')->redirect()->getTargetUrl();
                break;
            default:
                return 'flatform not support';
        }
        return $this->ApiResponse($data, 'generate-url');
    }
}
