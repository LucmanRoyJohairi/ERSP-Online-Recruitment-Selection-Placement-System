<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Job;
use App\Models\Screening;

class SkillTestNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($jobId, $type)
    {
        $this->jobId = $jobId;
        $this->type = $type;
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
        $screening = Screening::where([['job_id',$this->jobId], ['screening_type', $this->type]])->first();

        return (new MailMessage)
                ->line('Skill Test Details')
                // ->action('Notification Action', url('/'))
                ->line($screening->message);
    }
    public function toDatabase(){
        $job = Job::find($this->jobId);
        $screening = Screening::where([['job_id',$this->jobId], ['screening_type', $this->type]])->first();
        return [
            'Title' => 'Skill Test Details',
            'Description' => $screening->message,
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
