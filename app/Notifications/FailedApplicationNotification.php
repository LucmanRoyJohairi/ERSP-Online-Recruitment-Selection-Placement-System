<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Job;

class FailedApplicationNotification extends Notification
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
                    ->line('Unfortunately, someone has already been chosen for the position '. $job->name . ' that you have applied for. You are free to apply for another position.');
    }

    public function toDatabase(){
        $job = Job::find($this->jobId);
        return [
            'Title' => 'Application Progress Update',
            'Description' => 'Unfortunately, someone has already been chosen for the position '. $job->name . ' that you have applied for. You are free to apply for another position.',
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
