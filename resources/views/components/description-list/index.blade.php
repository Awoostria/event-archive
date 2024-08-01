@props(['title', 'description'])

<div>
    <div class="px-4 py-6 sm:px-6">
        <h3 class="text-base font-semibold leading-7 text-gray-900">
            {{ $title }}
        </h3>
        <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">
            {{ $description }}
        </p>
    </div>
    <div class="border-t border-gray-100">
        <dl class="divide-y divide-gray-100">
            {{ $slot }}
        </dl>
    </div>
</div>
