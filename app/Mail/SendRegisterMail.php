<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendRegisterMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    private $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email)
    {
        // $this->subject = "Thông báo có trả lời từ bình luận của bạn tại bài viết";
        // $this->data = $data;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->subject($this->subject)->replyTo('khuatthanh340@gmail.com', "CHANEL SHOP")->view('emails.send_mails',[
        //     'data' =>$this->data
        // ]);
        return $this->view('emails.send_mails');
    }
}
