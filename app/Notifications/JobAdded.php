<?php

namespace App\Notifications;

use App\Models\Job;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class JobAdded extends Notification
{
    use Queueable;

    public $job;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Job $job)
    {
        $this->job = $job;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

        $customername = $this->job->customer_name;
        $start = $this->job->start;
        $engineername = $this->job->engineer_name;


        return (new MailMessage)
                    ->subject('New Job Added - NHS')
                    ->greeting('Hello '.$engineername)
                    ->line('A New Job Has Been Added For You.')
                    ->line('Customer: '.$customername)
                    ->line('Job Start Date: '.$start)
                    // ->action('Notification Action', url('/'))
                    ->line('Please check your NHS App For more information!');
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
