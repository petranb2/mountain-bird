<?php

namespace App\Domain\Cases;

use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class SendCommonMail implements CaseInterface
{

    private MailerInterface $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * @throws TransportExceptionInterface
     */
    public function execute(): void
    {
        $email = (new Email())
            ->from('info@collegelink.gr')
            ->to('k.petros@collegelink.gr')
            ->subject('Time for Symfony Mailer!')
            ->text('Sending emails is fun again!')
            ->setHeaders()
            ->html('<p>See Twig integration for better HTML integration!</p>');

        $this->mailer->send($email);
    }
}