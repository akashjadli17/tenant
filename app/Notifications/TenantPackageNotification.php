<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class TenantPackageNotification extends Notification
{
    use Queueable;

    protected $owner;
    protected $package;

    public function __construct($owner, $package)
    {
        $this->owner   = $owner;
        $this->package = $package;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

   public function toArray(object $notifiable): array
{
    return [
        'title'      => 'New Owner Package',
        'message'    => 'Owner ' . $this->owner->name . ' activated a "' . $this->package->package_type . '" package.',
        'action_url' => url('/tenant/dashboard'),
        'package_id' => $this->package->id,
    ];
}

}
