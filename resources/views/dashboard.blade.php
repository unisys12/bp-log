<x-layouts.app :title="__('Dashboard')">
    <x-dashboard-heading
    :heading="__('Dashboard')"
    :subheading="__('')"
    />
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            @livewire('blood-pressure-chart')
        </div>
    </div>
</x-layouts.app>
