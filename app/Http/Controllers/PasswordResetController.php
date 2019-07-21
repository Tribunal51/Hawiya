<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Notifications\PasswordResetRequest;
use App\Notifications\PasswordResetSuccess;
use App\User;
use App\PasswordReset;

class PasswordResetController extends Controller
{
    /**
     * Create token password reset
     *
     * @param  [string] email
     * @return [string] message
     */
    public function create(Request $request)
    {
        // $request->validate([
        //     'email' => 'required|string|email',
        // ]);
        if(!isset($request->email)) {
            return -2;  // echo "Required fields missing";
        }
        $user = User::where('email', $request->email)->first();
        if(!$user) {
            return -3;  // echo "User not found.";
        }
        // if (!$user)
        //     return response()->json([
        //         'message' => "We can't find a user with that e-mail address."
        //     ], 404);
        $passwordReset = PasswordReset::updateOrCreate(
            ['email' => $user->email],
            [
                'email' => $user->email,
                'token' => str_random(60)
             ]
        );
        if ($user && $passwordReset)
            $user->notify(
                new PasswordResetRequest($passwordReset->token)
            );
        // return response()->json([
        //     'message' => 'We have e-mailed your password reset link!'
        // ]);
        return 1;   // echo "Password Reset Link Sent.";
    }
    /**
     * Find token password reset
     *
     * @param  [string] $token
     * @return [string] message
     * @return [json] passwordReset object
     */
    public function find($token)
    {
        if(!$token) {
            return -2;  // echo "Required fields missing";
        }
        $passwordReset = PasswordReset::where('token', $token)
            ->first();
        if (!$passwordReset) {
            // return response()->json([
            //     'message' => 'This password reset token is invalid.'
            // ], 404);
            return -4;  // echo "Invalid Password Reset Link";
        }
        if (Carbon::parse($passwordReset->updated_at)->addMinutes(720)->isPast()) {
            $passwordReset->delete();
            // return response()->json([
            //     'message' => 'This password reset token is invalid.'
            // ], 404);
            return -5;  // echo "Password Reset Link expired";
        }
        return response()->json($passwordReset);
    }
     /**
     * Reset password
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @param  [string] token
     * @return [string] message
     * @return [json] user object
     */
    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|confirmed',
            'token' => 'required|string'
        ]);

        if(!isset($request->email) || !isset($request->password) || !isset($request->password_confirmation) || !isset($request->token)) {
            return -2;  // echo "Required fields missing";
        }

        $passwordReset = PasswordReset::where([
            ['token', $request->token],
            ['email', $request->email]
        ])->first();
        if (!$passwordReset) {
            return -4;  // echo "Invalid Password Reset token.";
        
            // return response()->json([
            //     'message' => 'This password reset token is invalid.'
            // ], 404);
        }   
        $user = User::where('email', $passwordReset->email)->first();
        if (!$user) {
            // return response()->json([
            //     'message' => "We can't find a user with that e-mail address."
            // ], 404);
            return -3;  // echo "User does not exist.";
        }
        $user->password = bcrypt($request->password);
        $user->save();
        $passwordReset->delete();
        $user->notify(new PasswordResetSuccess($passwordReset));
        return response()->json($user);
    }
}