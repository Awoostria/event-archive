<div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
    <dt class="truncate text-sm font-medium text-gray-500">
        {{ $title }}
    </dt>
    <dd class="mt-1 flex items-baseline justify-between md:block lg:flex">
        <div class="flex items-baseline text-2xl font-semibold text-primary">
            {{ number_format($value) }}
            @isset($previousValue)
                <span class="ml-2 text-sm font-medium text-gray-500">
                    from {{ number_format($previousValue) }}
                </span>
            @endisset
        </div>

        @isset($percentage)
            <div
                class="inline-flex items-baseline rounded-full px-2.5 py-0.5 text-sm font-medium bg-primary text-white md:mt-2 lg:mt-0">
                <x-heroicon-m-arrow-up class="-ml-1 mr-0.5 h-5 w-5 flex-shrink-0 self-center text-white" />
                <span class="sr-only"> Increased by </span>
                {{ "$percentage%" }}
            </div>
        @endisset
    </dd>
</div>
