<?php

namespace W3z315\ModalNotifications\Http\Livewire;

use Livewire\Component;
use W3z315\ModalNotifications\Models\ModalNotification;

class ModalNotifications extends Component
{
    public $notifications;

    public function mount(): void
    {
        $this->notifications = ModalNotification::whereDoesntHave('users', function ($q) {
            $q->where('user_id', auth()->id());
        })->get();
    }

    public function dismissModalNotification($id): void
    {
        $notification = ModalNotification::findOrFail($id);
        $notification->users()->attach(auth()->id(), ['dismissed_at' => now()]);
        $this->notifications = $this->notifications->filter(fn($n) => $n->id !== $id);
    }

    public function render()
    {
        return view('filament-modal-notifications::livewire.modal-notifications', [
            'notifications' => $this->notifications,
        ]);
    }
}
