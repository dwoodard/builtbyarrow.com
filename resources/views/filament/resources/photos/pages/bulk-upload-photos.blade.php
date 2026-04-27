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

            @if (filled($this->data['paths'] ?? null))
                <div class="flex justify-end">
                    <button
                        type="button"
                        wire:click="submit"
                        class="px-4 py-2 bg-primary-600 text-white rounded-lg font-semibold hover:bg-primary-700 transition"
                    >
                        Save {{ count($this->data['paths'] ?? []) }} Photo{{ count($this->data['paths'] ?? []) !== 1 ? 's' : '' }}
                    </button>
                </div>
            @endif
        </div>
    </div>
</x-filament-panels::page>
