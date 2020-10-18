<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReplyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $content;
    public $subject;
    public $att;
    public $filename;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($content,$subject,$att,$filename)
    {
        $this->content = $content;
        $this->subject = $subject;
        $this->att = $att;
        $this->filename = $filename;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Commun Harbil Tamansourt")->view('mail.reply_mail')->with([
            "content"=>$this->content,
            "subject"=>$this->subject,
            "att"=>$this->att,
            "filename"=>$this->filename
        ]);
    }
}
