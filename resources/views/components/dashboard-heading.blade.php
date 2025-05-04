<div class="relative mb-6 w-full">
    <div class="grid grid-cols-2 gap-4">
        <div class="flex flex-col">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $heading }}</h1>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">{{ $subheading }}</p>
        </div>
        <div class="flex items-center justify-end">
            <flux:modal.trigger name="create-record">
            @if ($subheading)
                <flux:button>Add New Record</flux:button>
            @else
                <flux:button class="mb-2">Add New Record</flux:button>
            @endif
            </flux:modal.trigger>
        </div>
    </div>
    <flux:separator variant="subtle" />
    <flux:modal name="create-record" class="md:w-96">
        @livewire('create-record')
    </flux:modal>
</div>