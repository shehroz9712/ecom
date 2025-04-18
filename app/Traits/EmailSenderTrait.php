<?php

namespace App\Traits;

use App\Jobs\SendEmailJob;
use Illuminate\Support\Facades\Log;

trait EmailSenderTrait
{
    /**
     * Dispatch an email job.
     *
     * @param string $to          Recipient's email address
     * @param string $to_name     Recipient's name
     * @param string $subject     Email subject
     * @param string $view        Blade template for email
     * @param array  $data        Data to be passed to the view
     * @param array  $attachments Attachments (optional)
     */
    public function sendEmail(string $to, string $to_name, string $subject, string $view, array $data = [], array $attachments = [])
    {
       

        dispatch(new SendEmailJob($to, $to_name, $subject, $view, $data, $attachments));
    }



    /**
     * Dispatch bulk email jobs.
     *
     * @param array  $toUsers      List of recipients with 'email' and 'name'
     * @param string $subject      Email subject
     * @param string $view         Blade template for email
     * @param array  $data         Data to pass to the view
     * @param array  $attachments  Attachments (optional)
     */
    public function sendBulkEmail(array $toUsers, string $subject, string $view, array $data = [], array $attachments = [])
    {
        foreach ($toUsers as $user) {
            if (isset($user['email'], $user['name'])) {
                dispatch(new SendEmailJob($user['email'], $user['name'], $subject, $view, $data, $attachments));
            } else {
                Log::warning('Incomplete user information: ' . json_encode($user));
            }
        }
    }
}
