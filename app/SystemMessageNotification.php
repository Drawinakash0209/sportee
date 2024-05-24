<?php

namespace App;

use Illuminate\Notifications\Notification;

class SystemMessageNotification extends Notification
{
    public function __construct()
    {
    }

    public function via($notifiable): array
    {
        return ['database'];
    }

    public function toDatabase($notifiable): array
    {
        return [
            'message' => 'System message',
            'link' => 'http://example.com',
            'icon' => 'fa fa-bell',
            'type' => 'system_message',
        ];
    }

    public function toArray($notifiable): array
    {
        return [

        ];
    }
}
