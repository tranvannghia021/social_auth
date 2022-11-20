<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Facebook;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class FlatformController extends Controller
{

    function generateUrl($flatform)
    {
        $data = ['flatform' => $flatform];
        switch ($flatform) {
            case 'facebook' || 'google' || 'github' || 'gitlab' || 'linkedin' || 'twitter':
                $data['url'] = Socialite::driver($flatform)->redirect()->getTargetUrl();
                break;
            default:
                $data['url'] = null;
                return $this->ApiResponse($data, 'flatform not support');
        }
        return response()->json([
            'status' => true,
            'message' => 'generate-url',
            'data' => $data
        ]);
    }
}
