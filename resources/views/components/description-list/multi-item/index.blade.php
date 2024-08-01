@props(['title'])

<x-description-list.base-item>
    <dt class="text-sm font-medium leading-6 text-gray-900">
        {{ $title }}
    </dt>
    <dd class="mt-2 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
        <ul
            role="list"
            class="divide-y divide-gray-100 rounded-md border border-gray-200"
        >
            {{ $slot }}
        </ul>
    </dd>
</x-description-list.base-item>
