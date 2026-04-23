<x-filament-panels::page>
    <div class="space-y-4">
        @if ($this->uploadedCount > 0)
            <x-filament::section>
                <p class="text-center font-semibold text-success-600 dark:text-success-400">
                    {{ $this->uploadedCount }} {{ Str::plural('photo', $this->uploadedCount) }} saved — drop more anytime
                </p>
            </x-filament::section>
        @endif

        {{ $this->form }}
    </div>
</x-filament-panels::page>
