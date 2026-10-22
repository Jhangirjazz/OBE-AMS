<x-filament-panels::page>
    <div class="space-y-4">
        <div class="max-w-md">
            <label class="mb-1 block text-sm font-medium">Course Offering</label>
            <select
                wire:model.live="offeringId"
                class="w-full rounded-lg border-gray-300 text-sm shadow-sm dark:border-gray-600 dark:bg-gray-800"
            >
                @foreach ($this->offerings() as $offering)
                    <option value="{{ $offering->id }}">
                        {{ $offering->course?->code }} / {{ $offering->section }} / {{ $offering->semester?->name }}
                    </option>
                @endforeach
            </select>
        </div>

        @if ($this->offering())
            <div class="overflow-x-auto rounded-xl bg-white shadow dark:bg-gray-900">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b dark:border-gray-700">
                            <th class="p-2 text-left">CLO</th>
                            @foreach ($this->plos() as $plo)
                                <th class="p-2 text-center" title="{{ $plo->title }}">
                                    {{ $plo->ga_code }}
                                </th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($this->clos() as $clo)
                            <tr class="border-b dark:border-gray-700">
                                <td class="p-2 font-medium">
                                    {{ $clo->code }}
                                    <span class="text-xs text-gray-500">
                                        ({{ $clo->bloom_level }})
                                    </span>
                                </td>
                                @foreach ($this->plos() as $plo)
                                    <td class="p-1 text-center">
                                        <select
                                            wire:model="matrix.{{ $clo->id }}.{{ $plo->id }}"
                                            class="w-16 rounded border-gray-300 text-sm dark:border-gray-600 dark:bg-gray-800"
                                        >
                                            <option value="0">-</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div>
                <x-filament::button wire:click="save">
                    Save Matrix
                </x-filament::button>
            </div>

            <p class="text-xs text-gray-500 dark:text-gray-400">
                1 = low, 2 = medium, 3 = high, - = no mapping
            </p>
        @else
            <p class="text-sm text-gray-500">
                No course offering yet. Go make one in Curriculum → Course Offerings.
            </p>
        @endif
    </div>
</x-filament-panels::page>