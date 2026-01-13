@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">{{ __('messages.Subscription Notifications') }}</h2>

            @if($notifications->where('is_read', false)->count() > 0)
            <form action="{{ route('subscriptions.notifications.read-all') }}" method="POST">
                @csrf
                <button type="submit" class="text-sm text-indigo-600 hover:text-indigo-800 dark:text-indigo-400">
                    {{ __('messages.Mark All as Read') }}
                </button>
            </form>
            @endif
        </div>

        @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-300 rounded-lg">
            {{ session('success') }}
        </div>
        @endif

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
            @if($notifications->count() > 0)
                <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach($notifications as $notification)
                    <li class="p-4 {{ !$notification->is_read ? 'bg-blue-50 dark:bg-blue-900/20' : '' }}">
                        <div class="flex items-start justify-between">
                            <div class="flex items-start space-x-3">
                                <div class="flex-shrink-0">
                                    @if($notification->type === 'expired')
                                    <span class="inline-flex items-center justify-center h-10 w-10 rounded-full bg-red-100 dark:bg-red-900">
                                        <svg class="h-6 w-6 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </span>
                                    @else
                                    <span class="inline-flex items-center justify-center h-10 w-10 rounded-full bg-yellow-100 dark:bg-yellow-900">
                                        <svg class="h-6 w-6 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                        </svg>
                                    </span>
                                    @endif
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-900 dark:text-white">
                                        {{ $notification->message }}
                                    </p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                        {{ $notification->subscription->plan->name }} •
                                        {{ $notification->sent_at->diffForHumans() }}
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-2">
                                @if(!$notification->is_read)
                                <form action="{{ route('subscriptions.notifications.read', $notification) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="text-xs text-indigo-600 hover:text-indigo-800 dark:text-indigo-400">
                                        Mark as read
                                    </button>
                                </form>
                                @else
                                <span class="text-xs text-gray-400">Read</span>
                                @endif

                                @if($notification->subscription->status !== 'cancelled')
                                <a href="{{ route('subscriptions.renew', $notification->subscription) }}"
                                   class="text-xs px-2 py-1 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                                    {{ __('messages.Renew Now') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>

                <div class="px-4 py-3 bg-gray-50 dark:bg-gray-700">
                    {{ $notifications->links() }}
                </div>
            @else
                <div class="p-8 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('messages.No notifications') }}</h3>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">You don't have any subscription notifications yet.</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
