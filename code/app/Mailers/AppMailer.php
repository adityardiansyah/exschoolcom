<?php

namespace App\Mailers;

use Illuminate\Contracts\Mail\Mailer;
use App\Models\User;

class AppMailer
{
    protected $mailer;
    protected $from;
    protected $to;
    protected $view;
    protected $data = [];

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Delivers the View as an Email to the specified Receiver, given
     * a Sender and their Name.
     *
     * @param View  $view   The View for the Email.
     * @param array     $data   The Data for the View.
     * @param string    $to     The Email Address to send the Email to.
     * @param string    $from   The Email Address that sent the Email.
     * @param string    $name   The Name of the Person that sent the Email.
     *
     * @return void
     */
    public function deliver($view, $data, $to, $from = 'admin@ex-school.com', $name = 'Official Ex - SCHOOL')
    {
        $this->mailer->send($view, $data, function($message) use ($from, $to, $name)
        {
            if($from == null)
            $from = env('MAIL_USERNAME');

            $message->from($from, $name)
                    ->to($to);
        });
    }

    /**
     * Sends an Account Validation Link to the specified User.
     *
     * @param User $user The specified User.
     *
     * @return void;
     */
    public function sendValidationRequest(User $user)
    {
        $this->deliver('emails.aktivation', compact('user'), $user->email);
    }

    /**
     * Sends a Password Reset to the specified User.
     *
     * @param User $user The specified User.
     *
     * @return void;
     */
    public function sendPasswordResetRequest(User $user)
    {
        $this->deliver('emails.password_reset', compact('user'), $user->email);
    }
}