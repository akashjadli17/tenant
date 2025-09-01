<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class OwnerPackagePending extends Notification
{
    use Queueable;

    protected $package;

    public function __construct($package)
    {
        $this->package = $package;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
{
    return [
        'title' => 'Package Pending Approval',
        'message' => 'You have selected the ' . $this->package->package_type . ' package.',
        'package_id' => $this->package->id,
        'action_url' => route('admin.packages.approve.confirm', $notifiable->id),
    ];
}

}
