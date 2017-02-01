<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Request;
use App\Models\Loggedin;
use App\Models\User;
use Carbon\Carbon;

class LoginSuccess extends ListenerBase
{
    /**
     * Handle the event.
     *
     * @param  Login  $login
     * @return void
     */

    public function handle(Login $login)
    {
        $this->theuser->setLoginTheuser($login);

        $user = new Loggedin;
        $user->user_id = auth()->user()->id; // find the user associated with this event
        $user->last_login_at = Carbon::now();
        $user->last_login_ip = Request::getClientIp();
        $user->save();
    }
}
