<?php

namespace App\Mail;

use App\Models\SettingApp;

use App\Models\AccountBank;

use Illuminate\Bus\Queueable;
// use App\Services\XenditService;
use Illuminate\Mail\Mailable;
// use App\Services\TypeUserService;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

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
        // $xenditService = new XenditService();
        // $typeUserService = new TypeUserService();
        $settingApp = SettingApp::findOrFail(1)->first();
        $members = $settingApp->membertable['members'];
        foreach ($members as $key => $value) {
            if ($value['slug'] == strtolower($this->member->type_user)) {
                $found = $value['pricediscount'];
                break;
            }
        }
        return new Content(
            view: 'mail.notification-register-member',
            with: [
                'member' => $this->member,
                'bankAccounts' => AccountBank::get(),
                'priceRegistration' => $found
                // 'xenditVirtualAccounts' => $xenditService->getAllPaymentMethods(),
                // 'priceRegistration' => $typeUserService->getRegistrationPriceByUserType($this->member->type_user)
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
