<?php

namespace App\Mail;

use App\Models\QuoteRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewQuoteRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public QuoteRequest $quote)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New RFQ: ' . ($this->quote->subject ?? 'Formal Quote Request'),
            // Agar admin bisa langsung klik "Reply" di email dan otomatis membalas ke email pengirim
            replyTo: [
                new Address($this->quote->business_email, $this->quote->full_name),
            ],
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.quote-request',
        );
    }
}