<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Custom\Fcm\Fcm;

class FcmController extends Controller
{
    public function subscribeToTopic(Request $request)
    {        
        $response = Fcm::subscribe($request->token);

        return response()->json($response->content, $response->status);
    }

    public function sendNotification(Request $request)
    {
        $response = Fcm::send();

        return response()->json($response->content, $response->status);
    }
}
