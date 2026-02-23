<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use App\Models\Assessment;

class AssessmentInvitation extends Mailable
{
    use Queueable, SerializesModels;

    public $kandidat;
    public $assessment;

    // Kita terima data Kandidat dan Assessment saat surat dibuat
    public function __construct(User $kandidat, Assessment $assessment)
    {
        $this->kandidat = $kandidat;
        $this->assessment = $assessment;
    }

    // Judul Email (Subject)
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Undangan Tes Online - Humania TalentMap',
        );
    }

    // Menunjuk file tampilan (View) emailnya
    public function content(): Content
    {
        return new Content(
            view: 'admin.invitation',
        );
    }
}
