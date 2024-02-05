<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use App\Models\MessageThread;


class MessageSent extends Notification implements ShouldBroadcastNow
{
    use Queueable;

    /**
     * Create a new notification instance.
     */

    public $user;
    public $message;
    public $content;
    public $receiverId;

    public function __construct(
        $user,
        $message,
        $content,
        $receiverId,
    )
    {
        //
        $this->user = $user;
        $this->message = $message;
        $this->content = $content;
        $this->receiverId = $receiverId;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['broadcast'];
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
     * Get the broadcastable representation of the notification.
     */
    public function toBroadcast(object $notifiable): BroadcastMessage
    {
        // $unreadMessageCount = MessageThread::unreadCount($this->receiverId);

        // \Illuminate\Support\Facades\Log::debug('Unread Message Count: ' . $unreadMessageCount);

        return new BroadcastMessage([
            'user_id' => $this->user->id,
            'message_id' => $this->message->id,
            'content' => $this->content->id,
            'receiver_id' => $this->receiverId,
            // 'unread_message_count' => $unreadMessageCount,
        ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
