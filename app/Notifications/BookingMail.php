<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BookingMail extends Notification
{
    use Queueable;
    public $booking;
    /**
     * Create a new notification instance.
     */
    public function __construct($booking)
    {
        $this->booking = $booking;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $services = $this->booking->service;
        $servicesString = implode(', ', $services);
        return (new MailMessage())
            ->line('Welcome to Car Clinic')
            ->line('Here is your booking details.')
            ->line('Your mail: ' . $this->booking->email)
            ->line('Name: ' . $this->booking->name)
            ->line('Address: ' . $this->booking->address)
            ->line('Car Registration No: ' . $this->booking->reg_num)
            ->line('Booking Id: ' . $this->booking->booking_code)
            ->line('Services: ' . $servicesString)
            ->line('Total Charge: ' . $this->booking->cost)
            ->line('Booked On: ' . $this->booking->date)
            // ->action('Notification Action', url('/'))
            ->line('Thank you for using our services!');
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
