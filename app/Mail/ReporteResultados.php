<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;


class ReporteResultados extends Mailable
{
    use Queueable, SerializesModels;
    public $recomendaciones;

    /**
     * Create a new message instance.
     */
    public function __construct($recomendaciones)
    {
        $this->recomendaciones = $recomendaciones;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('enhernandez0316@gmail.com', 'Nicolás Hernández'),
            subject: 'Reporte Resultados',
        );
    }

    /**
     * Get the message content definition.
     */
    public function build()
    {
        return $this->view('emailRecomendaciones')
            ->with('recomendaciones', $this->recomendaciones);
    }

    public function content(): Content
    {
        return new Content(
            view: 'emailRecomendaciones',
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
