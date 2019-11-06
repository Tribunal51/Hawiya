<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
// use PushNotification;
use Edujugon\PushNotification\PushNotification;
use App\Helpers\AppHelper as Helper;

class PushNotificationsController extends Controller
{
    //

    public function pushToUser(Request $request) {
        if(!isset($request->user_id) || !isset($request->message)) {
            return -2;  // echo "Required fields missing.";
        }
        $user = User::find($request->user_id);
        if(!$user) {
            return -3;  // echo "User does not exist.";
        }
        if(!$user->device_token) {
            return -4;  // echo "User has no device_token.";
        }
        //return $user;

        // if(!(ctype_xdigit($user->device_token) && (strlen($user->device_token) === 64))) {
        //     return -5;  // echo "Invalid device token";
        // }
        return Helper::pushMessage($user->id, $request->message);
    }
}
