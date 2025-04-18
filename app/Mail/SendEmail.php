<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $data;
    public $view;
    public $attachments;

    /**
     * Create a new message instance.
     */
    public function __construct($view, $data, $attachments = [])
    {
        $this->view = $view;
        $this->data = $data;
        $this->attachments = $attachments;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        $email = $this->subject($this->data['subject'])
                      ->view('emails.' . $this->view)
                      ->with($this->data);

        // Add attachments if available
        if (!empty($this->attachments)) {
            foreach ($this->attachments as $attachment) {
                $email->attach($attachment['path'], [
                    'as' => $attachment['name']
                ]);
            }
        }

        return $email;
    }
}
