<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class OwnerPackageActivated extends Notification
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
        'title' => 'Package Activated',
        'message' => 'Your package "' . $this->package->package_type . '" is now active.',
        'package_id' => $this->package->id,
        'action_url' => route('owner.dashboard'),
    ];
}

}
