<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class AdminPackageApproval extends Notification
{
    use Queueable;

    protected $owner;
    protected $package;

    public function __construct($owner, $package)
    {
        $this->owner = $owner;
        $this->package = $package;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'title' => 'Package Approval Needed',
            'message' => $this->owner->name . ' requested package "' . $this->package->package_type . '".',
            // ⭐ link to GET confirm page (NOT the POST route)
            'action_url' => route('admin.packages.approve.confirm', $this->owner->id),
        ];
    }
}
