<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Events\UserHasRegistered;
use App\Mailers\AppMailer as Mailer;
use App\Support\Facades\Flash;

class EmailValidationToken
{
    /**
     * The Mailer for the Application
     *
     * @var Mailer
     */
    public $mailer;

    /**
     * Create the event listener.
     *
     * @param  Mailer $mailer
     *
     * @return void
     */
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Handle the event.
     *
     * @param  UserHasRegistered  $event
     *
     * @return void
     */
    public function handle(UserHasRegistered $event)
    {
        $this->mailer->sendValidationRequest($event->user);

        Flash::success('You have been sent a Validation Request to your Email Account.');
    }
}