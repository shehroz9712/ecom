<?php

namespace App\Jobs;

use App\Mail\SendEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $to;
    protected $to_name;
    protected $subject;
    protected $view;
    protected $data;
    protected $attachments;

    /**
     * Create a new job instance.
     */
    public function __construct($to, $to_name, $subject, $view, $data = [], $attachments = [])
    {
        $this->to = $to;
        $this->to_name = $to_name;
        $this->subject = $subject;
        $this->view = $view;
        $this->data = $data;
        $this->attachments = $attachments;
    }

    /**
     * Execute the job.
     */

    public function handle()
    {
        try {
            $this->data['subject'] = $this->subject;
            $this->data['to_name'] = $this->to_name;

            Mail::to($this->to, $this->to_name)
                ->send(new SendEmail($this->view, $this->data, $this->attachments));
        } catch (\Exception $e) {
            Log::error("SendEmailJob Failed: " . $e->getMessage());
        }
    }
}
