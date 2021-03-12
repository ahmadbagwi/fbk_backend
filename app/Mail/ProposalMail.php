<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\BiodataPengajuan;
use App\Models\User;
use App\Models\Email;

class ProposalMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');
        $data = BiodataPengajuan::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->first();
        return $this->subject('Proposal FBK')->view('email.konfirmasi', ['data' => $data]);
    }
}
