<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Models\Invite;
use Request;
use Illuminate\Contracts\Mail\Mailer;

class SendInvite extends Job
{

    /**
     * User Model.
     *
     * @var App\Models\Invite
     */
    protected $invite;

    /**
     * Create a new SendMailCommand instance.
     *
     * @param  App\Models\Invite  $invite
     * @return void
     */
    public function __construct(Invite $invite)
    {
        $this->invite = $invite;
    }

    /**
     * Execute the job.
     *
     * @param  Mailer  $mailer
     * @return void
     */
    public function handle(Mailer $mailer)
    {
        $data = [
            'title'  => trans('front/invite.email-title'),
            'intro'  => trans('front/invite.email-intro'),
            'link'   => trans('front/invite.email-link'),
            'registration_code' => $this->invite->registration_code,
            'invitor' => $this->invite->invitor
        ];
        
        $mailer->send('emails.invite.invite', $data, function($message) {
            $message->to($this->invite->email)
                    ->subject(trans('front/invite.email-title'));
        });
    }
}
