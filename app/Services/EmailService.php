<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;

class EmailService
{
    public function sendMail($to, $subject, $body)
    {
        try {
            Mail::raw($body, function ($message) use ($to, $subject) {
                $message->to($to)->subject($subject);
            });

            return [
                'success' => true,
                'message' => 'Email sent successfully!',
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'Failed to send email: ' . $e->getMessage(),
            ];
        }
    }
}
