<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Job;

class ShortlistNotification extends Notification
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
                    ->line('Application Update')
                    // ->action('Notification Action', url('/'))
                    ->line('Congratulations! You have been accepted to the shortlist for the position ' . $job->name .' you applied for! Please wait for further instructions about the next steps you need to take for the screening process, you will be sent via notification or email about the information on the screening process. ');
    }

    public function toDatabase(){
        $job = Job::find($this->jobId);
        return [
            'Title' => 'Application Progress Update',
            'Description' => 'Congratulations! You have been accepted to the shortlist for the position ' . $job->name .' you applied for! Please wait for further instructions about the next steps you need to take for the screening process, you will be sent via notification or email about the information on the screening process. ',
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
