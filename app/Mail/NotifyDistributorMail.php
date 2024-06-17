<?php

namespace App\Mail;


use Illuminate\Bus\Queueable;
// use App\Services\XenditService;
use Illuminate\Mail\Mailable;
// use App\Services\TypeUserService;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyDistributorMail extends Mailable
{
    use Queueable, SerializesModels;

    private $distributor;

    /**
     * Create a new message instance.
     */
    public function __construct($distributor)
    {
        $this->distributor = $distributor;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Email notifikasi penerimaan pendaftaran reseller / subdis  KIMOON',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {

        return new Content(
            view: 'mail.notification-distributor',
            with: [
                'member' => $this->distributor,
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
