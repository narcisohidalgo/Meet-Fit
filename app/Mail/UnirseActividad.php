<?php

namespace App\Mail;

use App\Models\Demandada;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class UnirseActividad extends Mailable
{
    use Queueable, SerializesModels;

    public $usuario;
    public $actividad;


    /**
     * Create a new message instance.
     */
    public function __construct($usuario, $actividad)
    {

        $this->usuario = $usuario;
        $this->actividad = $actividad;
    }

    public function build()
    {
        return $this->view('emails.unirseActividad');
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Meet&Fit',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'unirseActividad',
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
