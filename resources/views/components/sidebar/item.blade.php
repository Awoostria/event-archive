<div class="bg-white rounded-lg">
    <div @class([
        'relative flex items-center space-x-3 rounded-lg bg-primary px-6 py-5 shadow-sm focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:border-gray-400',
        'bg-primary-400 bg-opacity-75' => $selected,
    ])>
        <div class="flex-shrink-0">
            <p class="text-xl vertical-rl text-white">
                {{ $event->start_date->format('Y') }}
            </p>
        </div>
        <div class="min-w-0 flex-1">
            <a
                href="{{ route('event', $event) }}"
                wire:navigate
                class="focus:outline-none"
            >
                @if ($event->getLogo())
                    <img src="{{ $event->getLogo()?->getUrl() }}">
                @else
                    <h2 class="text-2xl font-bold tracking-tight text-white">
                        {{ $event->name }}
                    </h2>
                @endif
                <span
                    class="absolute inset-0"
                    aria-hidden="true"
                ></span>
            </a>
        </div>
    </div>
</div>
