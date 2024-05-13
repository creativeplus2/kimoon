<?php

namespace App\Mail;

use App\Models\AccountBank;
use App\Services\TypeUserService;
use App\Services\XenditService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NotifyRegisterMemberMail extends Mailable
{
    use Queueable, SerializesModels;

    private $member;

    /**
     * Create a new message instance.
     */
    public function __construct($member)
    {
        $this->member = $member;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Registrasi Member KIMOON',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $xenditService = new XenditService();
        $typeUserService = new TypeUserService();

        return new Content(
            view: 'mail.notification-register-member',
            with: [
                'member' => $this->member,
                'bankAccounts' => AccountBank::get(),
                'xenditVirtualAccounts' => $xenditService->getAllPaymentMethods(),
                'priceRegistration' => $typeUserService->getRegistrationPriceByUserType($this->member->type_user)
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
