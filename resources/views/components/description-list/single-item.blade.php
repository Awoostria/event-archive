@props(['title', 'label', 'url'])

<x-description-list.base-item>
    <dt class="text-sm font-medium text-gray-900">
        {{ $title }}
    </dt>
    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0 prose prose-sm">
        <a
            href="{{ $url }}"
            target="_blank"
        >
            {{ $label }}
        </a>
    </dd>
</x-description-list.base-item>
