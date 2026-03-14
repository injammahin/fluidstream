<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactFormSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function envelope(): Envelope
    {
        $fullName = trim(($this->data['first_name'] ?? '') . ' ' . ($this->data['last_name'] ?? ''));

        return new Envelope(
            subject: 'New Contact Form Submission from ' . ($fullName ?: 'Website Visitor'),
            replyTo: [
                new \Illuminate\Mail\Mailables\Address(
                    $this->data['email'],
                    $fullName ?: $this->data['email']
                ),
            ],
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.contact.submitted',
            with: [
                'data' => $this->data,
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}