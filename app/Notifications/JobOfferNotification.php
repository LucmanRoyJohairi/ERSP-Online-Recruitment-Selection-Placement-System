<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Job;

class JobOfferNotification extends Notification
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
                    ->line('New job offer')
                    // ->action('Notification Action', url('/'))
                    ->line('Congratulations! You have received a new job offer for the position ' . $job->name . '. Visit the job offers page to view more info on the offer.');
    }

    public function toDatabase(){
        $job = Job::find($this->jobId);

        return [
            'Title' => 'New job offer',
            'Description' => 'Congratulations! You have received a new job offer for the position ' . $job->name . '. Visit the job offers page to view more info on the offer.',
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
