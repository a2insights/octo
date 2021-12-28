
<x-livewire-tables::table.cell>
    <div class="flex-1">
        <span>{{ $row->data['title'] }}</span>
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="flex-1">
        <span>{{ $row->data['description'] }}</span>
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="flex-1 text-left pr-10">
        <span>{{ $row->created_at->diffForHumans() }}</span>
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="px-4 flex justify-end">
        @if($row->read_at)
            <button
                wire:click.stop.prevent="markAsUnread('{{ $row->id }}')"
                wire:loading.attr="disabled"
                class="px-2 transition-colors duration-700 transform bg-indigo-500 hover:bg-blue-400 text-gray-100 text-sm rounded-lg focus:border-4 border-indigo-300"
            >
                {{ __('octo::messages.notifications.mark_as_unread') }}
            </button>
        @else
            <button
                wire:click.stop.prevent="markAsRead('{{ $row->id }}')"
                wire:loading.attr="disabled"
                class="px-2 bg-transparent border-2 border-indigo-500 text-indigo-500 text-sm rounded-lg transition-colors duration-700 transform hover:bg-indigo-500 hover:text-gray-100 focus:border-4 focus:border-indigo-300"
            >
            {{ __('octo::messages.notifications.mark_as_read') }}
            </button>
        @endif
    </div>
</x-livewire-tables::table.cell>
