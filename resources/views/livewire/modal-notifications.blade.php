<div>
    @foreach($notifications as $notification)
        <div
            wire:key="notification-{{ $notification->id }}"
            x-data="{ open: true }"
            x-show="open"
            class="fixed inset-0 z-50 flex items-center justify-center max-h-screen overflow-y-scroll mn-notification" style="background: rgba(0,0,0,.65);"
        >
            <div
                class="absolute inset-0 bg-gray-500 dark:bg-gray-700/10"
                x-on:click="open = false"
                wire:click="dismissModalNotification('{{ $notification->id }}')"
            ></div>

            <div class="relative w-full max-w-xl rounded-xl bg-white shadow-2xl ring-1 ring-gray-950/5 transition dark:bg-gray-800 dark:ring-white/10" style="max-height: 100vh; overflow: scroll;">
                <div class="p-6">
                    <div class="mt-2 text-sm text-gray-600 dark:text-gray-400 markdown-body">
                            {!! Str::markdown('# ' . $notification->title) !!}
                            {!! Str::markdown($notification->content) !!}

                    </div>
                    <div class="mt-6 flex justify-end gap-x-3">
                        <x-filament::button
                            x-on:click="open = false"
                            wire:click="dismissModalNotification('{{ $notification->id }}')">
                            {{ __('filament-modal-notifications::notifications.dismiss') }}
                        </x-filament::button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

</div>
