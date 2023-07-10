<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BugNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    private $task;
    public function __construct($task)
    {
        $this->task= $task;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'bug_id' => $this->task->bug_id,
            'user_id' =>$this->task->user_id,
            'task_id' =>$this->task->id,
            'title' => 'New Task',
            'message' => 'With bug name', $this->task->bug->name,
            'url'=> route('programmer.task.index', $this->task->id),
            
        ];
    }
}
