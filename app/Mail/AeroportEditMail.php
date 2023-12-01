<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Aeroports;

class AeroportEditMail extends Mailable
{
    use Queueable, SerializesModels;

    public $aeroports;

    /**
     * Create a new message instance.
     */
    public function __construct(Aeroports $aeroports)
    {
        $this->aeroports = $aeroports;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Donnée modifié dans la BDD "Aeroport"',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.aeroport.airportEdit',
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
