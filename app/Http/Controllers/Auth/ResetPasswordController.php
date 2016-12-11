<?php

namespace Larafication\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Larafication\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Larafication\Services\Reminder\SentinelReminder;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Reset the given user's password.
     *
     * @param \Illuminate\Http\Request|Request $request
     * @param SentinelReminder                 $reminder
     *
     * @return \Illuminate\Http\Response
     */
    public function reset(Request $request, SentinelReminder $reminder)
    {
        $this->validate($request, [
            'token' => 'required', 'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
        ]);

        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        $response = $reminder->reset(
            $this->credentials($request), function ($user, $password) {
                $this->resetPassword($user, $password);
            }
        );

        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        return $response == \Password::PASSWORD_RESET
            ? $this->sendResetResponse($response)
            : $this->sendResetFailedResponse($request, $response);
    }

    /**
     * Reset the given user's password.
     *
     * @param \Illuminate\Contracts\Auth\CanResetPassword $user
     * @param string                                      $password
     *
     * @return void
     */
    protected function resetPassword($user, $password)
    {
        //closure call
        $token = app('request')->input('token');
        $reminder = app('Larafication\Services\Reminder\SentinelReminder');

        if ($reset = $reminder->complete($user, $token, $password)) {
            $this->guard()->login($user);
        }
    }
}
