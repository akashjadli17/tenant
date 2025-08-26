<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;

class PackageExpiringSoon extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public $expiresAt,
        public int $daysLeft
    ) {}

    /**
     * Channels: database only (you can add 'mail' if you want).
     */
    public function via($notifiable): array
    {
        return ['database'];
    }

    /**
     * Data saved to notifications table.
     */
    public function toDatabase($notifiable): array
    {
        return [
            'title'      => 'Package Expiring Soon',
            'message'    => "Your current package will expire in {$this->daysLeft} day(s).",
            'expires_at' => optional($this->expiresAt)->toDateString(),
            'action_url' => route('packages.front'), // route to renew/choose packages
        ];
    }
}
