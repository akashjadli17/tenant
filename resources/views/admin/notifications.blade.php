@extends('layouts.adminmaster')

@section('title', 'My Notifications')

@section('content')
    <h4>My Notifications</h4>

    @forelse(auth()->user()->notifications as $notif)
        <div class="alert alert-info mb-2">
            {{ $notif->data['message'] }}
            <small class="text-muted">{{ $notif->created_at->diffForHumans() }}</small>
        </div>
    @empty
        <p>No notifications yet.</p>
    @endforelse
@endsection
