<?php

namespace App\Notifications;

use App\Order;
use App\Http\Resources\OrderResource;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NoticeStatusChange extends Notification
{
    use Queueable;
    protected $order;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order=$order;
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
       // dd($notifiable);
        return (new MailMessage)
            ->line('One of your orders changed status')
            ->line("order: "
                    .$this->order->product->name
                    .">"
                    .$this->order->product->option->name
                    .":"
                    .$this->order->choice->name
            )
            ->line("number :"
                 .$this->order->number
            )
            ->line("status: "
                .$this->order->status
            );

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
