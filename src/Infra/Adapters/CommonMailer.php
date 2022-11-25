<?php

namespace App\Infra\Adapters;

use Symfony\Component\Mailer\MailerInterface;

class CommonMailer
{
    private MailerInterface $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendMail()
    {

    }
}