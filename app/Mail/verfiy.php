<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;

class verfiy extends Mailable
{
    use Queueable, SerializesModels;
    public $information = [];
    public function __construct($info)
    {
        $this->information = $info;

    }

    /**
     * Build the message.
     *
     * @return $this
     */

    public function build()
    {
        return $this->from("rashedhamood66@gmail.com","botlunsher")->subject($this->information["subject"])->markdown("mail")->with("info",$this->information);
    }
}
