<x-layouts.app :title="__('Records')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="overflow-x-auto">
        <table class="min-w-full divide-y-2 divide-gray-200 dark:divide-gray-700">
            <thead class="ltr:text-left rtl:text-right">
                <tr class="*:font-medium *:text-gray-900 dark:*:text-white">
                    <th class="px-3 py-2 whitespace-nowrap capitalize">id</th>
                    <th class="px-3 py-2 whitespace-nowrap capitalize">user</th>
                    <th class="px-3 py-2 whitespace-nowrap capitalize">weight</th>
                    <th class="px-3 py-2 whitespace-nowrap capitalize">systolic</th>
                    <th class="px-3 py-2 whitespace-nowrap capitalize">diastolic</th>
                    <th class="px-3 py-2 whitespace-nowrap capitalize">pulse</th>
                    <th class="px-3 py-2 whitespace-nowrap capitalize">date</th>
                    <th class="px-3 py-2 whitespace-nowrap capitalize">time</th>
                    <th class="px-3 py-2 whitespace-nowrap capitalize">notes</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                @foreach ($records as $record)
                    <tr>
                        <td class="px-3 py-2 whitespace-nowrap text-sm text-gray-900 dark:text-white">{{ $record->id }}</td>
                        <td class="px-3 py-2 whitespace-nowrap text-sm text-gray-900 dark:text-white">{{ $record->user->name }}</td>
                        <td class="px-3 py-2 whitespace-nowrap text-sm text-gray-900 dark:text-white">{{ $record->weight }}</td>
                        <td class="px-3 py-2 whitespace-nowrap text-sm text-gray-900 dark:text-white">{{ $record->systolic }}</td>
                        <td class="px-3 py-2 whitespace-nowrap text-sm text-gray-900 dark:text-white">{{ $record->diastolic }}</td>
                        <td class="px-3 py-2 whitespace-nowrap text-sm text-gray-900 dark:text-white">{{ $record->pulse }}</td>
                        <td class="px-3 py-2 whitespace-nowrap text-sm text-gray-900 dark:text-white">{{ $record->date->format('Y-m-d') }}</td>
                        <td class="px-3 py-2 whitespace-nowrap text-sm text-gray-900 dark:text-white">{{ $record->time->format('H:i a') }}</td>
                        <td class="px-3 py-2 whitespace-nowrap text-sm text-gray-900 dark:text-white">{{ $record->notes }}</td>
                        <td class="px-3 py-2 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                            <a href="{{ route('records.edit', $record->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                            <form action="{{ route('records.destroy', $record->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                            </form>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</x-layouts.app>