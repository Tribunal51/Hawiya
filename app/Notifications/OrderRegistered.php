<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

use App\LogodesignOrder;
use App\Models\Order\MasterOrder;


class OrderRegistered extends Notification
{
    use Queueable;

    public $all_orders;
    public $master_order;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($all_orders = null, $master_order = null)
    {
        //
        if(!$all_orders) {
            $this->all_orders = LogodesignOrder::take(5)->get();
        }
        else {
            $this->all_orders = $all_orders;
        }

        if(!$master_order) {
            $this->master_order = MasterOrder::first();
        }
        else {
            $this->master_order = $master_order;
        }
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
        $url = url('http://hawiya.net');
        return (new MailMessage)
                    ->line('Your order has been registered. Your order token for reference is <strong>'.$this->master_order->id.'</strong>.')
                    ->line('Your order details are as follows')
                    ->action('Go to website', $url)
                    ->line('Thank you for using our application!')
                    ->markdown('vendor.notifications.order_registered', ['master_order' => $this->master_order, 'all_orders' => $this->all_orders]);
                    

        // return (new MailMessage) 
        //     ->view('emails.order_registered', ['all_orders' => isset($this->all_orders) ? $this->all_orders : LogodesignOrder::take(5)->get(), 'master_order' => isset($this->master_order) ? $this->master_order : MasterOrder::first()]);
            
        // return (new MailMessage) 
        //     ->line('Your order has been registered. Your order number for reference is '.isset($this->master_order->id) ? $this->master_order->id : null)
        //     ->line('<table class="table">
        //         <thead class="thead-dark">
        //             <th scope="col">Order Token</th> 
        //             <th scope="col">Category</th> 
        //         </thead> 
        //         <tbody>
        //             @foreach($this->all_orders as $order)
        //                 <tr> 
        //                     <td>{{ $order->order_token }}</td> 
        //                     <td>{{ $order->category->name }}</td>
        //                 </tr> 
        //             @endforeach 
        //         </tbody> 
        //     </table>')
        //     ->action('Go To website ',$url) 
        //     ->line('Thank you for using our application!'); 

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
            $master_order, 
            $all_orders
        ];
    }
}
