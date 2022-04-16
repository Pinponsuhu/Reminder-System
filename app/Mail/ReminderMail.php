<?php

namespace App\Mail;

use App\Models\Appointment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReminderMail extends Mailable
{
    use Queueable, SerializesModels;
    public $name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $full_name,$next_reminder,$appointment_token)
    {
        $this->email = $email;
         $this->full_name = $full_name;
         $this->next_reminder = $next_reminder;
         $this->appointment_token = $appointment_token;
        //  dd($preferred_date);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
            // dd($this->preferred_date);
            $name = $this->full_name;
            $date = $this->next_reminder;
            $appointment_token = $this->appointment_token;
            // dd($date);
            return $this
        ->from('Pinponsuhuj@gmail.com')
        ->to($this->email)
        ->subject('Lagos State University Healthcare Reminde')
        ->markdown('email.index')->with([
            'full_name'=>$name,
            'date'=>$date,
            'appointment_token' => $appointment_token
        ]);
    }
}
