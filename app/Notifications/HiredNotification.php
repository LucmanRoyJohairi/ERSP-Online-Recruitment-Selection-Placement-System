<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Job;

class HiredNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    protected $jobId;

    public function __construct($jobId)
    {
        $this->jobId = $jobId;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $job = Job::find($this->jobId);
        return (new MailMessage)
                    ->line('Application Progress Update')
                    // ->action('Notification Action', url('/'))
                    ->line('Congratulations! You are now officially hired for the position ' . $job->name . ' .You will receive an email or a text message about what steps you will need to take after being hired. We look forward to working with you!');
    }

    public function toDatabase(){
        $job = Job::find($this->jobId);
        return [
            'Title' => 'Application Progress Update',
            'Description' => 'Congratulations! You are now officially hired for the position ' . $job->name . ' .You will receive an email or a text message about what steps you will need to take after being hired. We look forward to working with you!',
        ];
    }
    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
