@props(['icon', 'label', 'url'])

<li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
    <div class="flex w-0 flex-1 items-center">
        <x-dynamic-component
            :component="$icon"
            class="h-5 w-5 flex-shrink-0 text-primary"
        />
        <div class="ml-4">
            <span class="font-medium">
                {{ $label }}
            </span>
        </div>
    </div>
    <div class="ml-4 flex-shrink-0">
        <a
            href="{{ $url }}"
            target="_blank"
            class="font-medium text-primary hover:text-primary-300"
        >
            View
        </a>
    </div>
</li>
