<x-filament-panels::page>
    <div class="space-y-4">
        <div class="max-w-xs">
            <label class="mb-1 block text-sm font-medium">Program</label>
            <select
                wire:model.live="programId"
                class="w-full rounded-lg border-gray-300 text-sm shadow-sm dark:border-gray-600 dark:bg-gray-800"
            >
                @foreach ($this->programs() as $program)
                    <option value="{{ $program->id }}">
                        {{ $program->name }} ({{ $program->code }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="overflow-x-auto rounded-xl bg-white shadow dark:bg-gray-900">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b dark:border-gray-700">
                        <th class="p-2 text-left">PEO</th>
                        @foreach ($this->plos() as $plo)
                            <th class="p-2 text-center" title="{{ $plo->title }}">
                                {{ $plo->ga_code }}
                            </th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($this->peos() as $peo)
                        <tr class="border-b dark:border-gray-700">
                            <td class="p-2 font-medium">
                                {{ $peo->code }} — {{ $peo->title }}
                            </td>
                            @foreach ($this->plos() as $plo)
                                <td class="p-1 text-center">
                                    <select
                                        wire:model="matrix.{{ $peo->id }}.{{ $plo->id }}"
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
    </div>
</x-filament-panels::page>