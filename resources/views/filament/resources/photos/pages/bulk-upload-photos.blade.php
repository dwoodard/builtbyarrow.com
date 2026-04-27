<x-filament-panels::page>
    <div class="space-y-4">
        @if ($this->uploadedCount > 0)
            <x-filament::section>
                <p class="text-center font-semibold text-success-600 dark:text-success-400">
                    {{ $this->uploadedCount }} {{ Str::plural('photo', $this->uploadedCount) }} saved — drop more anytime
                </p>
            </x-filament::section>
        @endif

        <div class="space-y-6">
            {{ $this->form }}

            <div class="flex justify-end">
                <button
                    type="button"
                    wire:click="submit"
                    wire:loading.attr="disabled"
                    :disabled="!@js(filled($this->data['paths'] ?? null))"
                    class="px-4 py-2 bg-primary-600 text-white rounded-lg font-semibold hover:bg-primary-700 disabled:bg-gray-400 disabled:cursor-not-allowed transition"
                >
                    <span wire:loading.remove>
                        @php
                            $count = count($this->data['paths'] ?? []);
                            $label = $count > 0
                                ? "Save {$count} Photo" . ($count !== 1 ? 's' : '')
                                : 'Save Photos';
                        @endphp
                        {{ $label }}
                    </span>
                    <span wire:loading>Saving...</span>
                </button>
            </div>
        </div>
    </div>
</x-filament-panels::page>
