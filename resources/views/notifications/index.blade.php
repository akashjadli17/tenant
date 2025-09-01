{{-- resources/views/notifications/index.blade.php --}}
@extends('layouts.adminmaster')

@section('title', 'My Notifications')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h4 class="mb-4">My Notifications</h4>

            @php
                $user = auth()->user();
                // Block notifications if admin/owner has no package
                $shouldHide = in_array($user->user_type, ['owner','admin']) && !$user->package_id;
                $notifications = $shouldHide ? collect() : $user->notifications;
            @endphp

            @forelse($notifications as $notif)
                <div class="alert alert-info d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <strong>{{ $notif->data['title'] ?? 'Notification' }}</strong><br>
                        {{ $notif->data['message'] ?? '' }}
                        <div class="text-muted small mt-1">
                            <i class="mdi mdi-clock-outline"></i>
                            {{ $notif->created_at->diffForHumans() }}
                        </div>
                    </div>
                    @if(!$notif->read_at)
                        <form method="POST" action="{{ route('notifications.read', $notif->id) }}">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-sm btn-outline-primary">Mark as Read</button>
                        </form>
                    @endif
                </div>
            @empty
                <div class="alert alert-secondary text-center">
                    No notifications yet.
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
