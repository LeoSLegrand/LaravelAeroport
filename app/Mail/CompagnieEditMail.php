<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Compagnies;

class CompagnieEditMail extends Mailable
{
    use Queueable, SerializesModels;

    public $compagnies;

    /**
     * Create a new message instance.
     */
    public function __construct(Compagnies $compagnies)
    {
        $this->compagnies = $compagnies;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Une Compagnie à été modifié dans la BDD "Compagnie"',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.compagnie.compagnieEdit',
        );

        //return $this->view('emails.welcome');
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
