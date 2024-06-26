<?php


use function Livewire\Volt\{state, mount};

state([
    'notifications' => [],
]);

mount(function (){
    $this->notifications = auth()->user()->notifications;
});

$markAsRead = function ($notificationId) {

    $notification = $this->notifications->find($notificationId)->markAsRead();
    $this->notifications = auth()->user()->notifications;
};

?>

<div>
    @if(count($notifications) === 0)
        <div class="flex bg-yellow-100 rounded-lg p-4 mb-4 text-sm text-yellow-700" role="alert">
            <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0 1 1 0 002 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <div>
                <span class="font-medium">You don't have any notifications.</span>
            </div>
        </div>
    @else
        @foreach($notifications as $notification)
            <div class="flex bg-green-100 rounded-lg p-4 mb-4 text-sm text-green-700" role="alert">

                <div>
                    <span class="font-medium">{{$notification->data['message']}}</span>
                </div>
                <button wire:click="markAsRead('{{ $notification->id }}')" class="text-xs text-blue-500">Mark as read</button>
            </div>
        @endforeach
    @endif
</div>
