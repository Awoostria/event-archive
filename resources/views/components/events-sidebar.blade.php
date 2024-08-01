<div x-data="{ showMobileMenu: false }">
    <div
        class="relative z-50 lg:hidden"
        role="dialog"
        aria-modal="true"
    >
        <div
            class="fixed inset-0 bg-gray-900/80"
            aria-hidden="true"
            x-show="showMobileMenu"
            x-cloak
        ></div>

        <div
            class="fixed inset-0 flex"
            x-show="showMobileMenu"
            x-cloak
        >
            <div class="relative mr-16 flex w-full max-w-xs flex-1">
                <div
                    class="flex grow flex-col gap-y-5 overflow-y-auto bg-gray-900 px-6 pb-2"
                    x-on:click.outside="showMobileMenu = false"
                >
                    <div class="flex h-16 shrink-0 items-center flex gap-16">
                        <a
                            href="{{ route('home') }}"
                            wire:navigate
                        >
                            <img
                                src="{{ asset('images/logo-primary-white.svg') }}"
                                alt="Awoostria"
                                class="h-10 w-auto"
                                width="245"
                                height="48"
                            />
                        </a>

                        <button
                            type="button"
                            class="-m-2.5 p-2.5"
                            x-on:click="showMobileMenu = false"
                        >
                            <span class="sr-only">Close sidebar</span>
                            <svg
                                class="h-6 w-6 text-white"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                aria-hidden="true"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M6 18L18 6M6 6l12 12"
                                />
                            </svg>
                        </button>
                    </div>
                    <nav class="flex flex-1 flex-col">
                        <ul
                            role="list"
                            class="flex flex-1 flex-col gap-y-7"
                        >
                            <li>
                                <ul
                                    role="list"
                                    class="-mx-2 space-y-3"
                                >
                                    @foreach ($events as $event)
                                        <x-sidebar.item
                                            :event="$event"
                                            :selected="$selectedEvent?->is($event) ?? false"
                                        />
                                    @endforeach
                                </ul>
                            </li>
                            <x-sidebar.back-to-main-website />
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    {{-- Static sidebar for desktop --}}
    <div class="hidden lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-80 lg:flex-col">
        <div class="flex grow flex-col gap-y-5 overflow-y-auto bg-gray-900 px-6">
            <div class="flex h-16 shrink-0 items-center mt-2 justify-center">
                <a
                    href="{{ route('home') }}"
                    wire:navigate
                >
                    <img
                        src="{{ asset('images/logo-primary-white.svg') }}"
                        alt="Awoostria"
                        class="h-10 w-auto"
                        width="245"
                        height="48"
                    />
                </a>
            </div>
            <nav class="flex flex-1 flex-col">
                <ul
                    role="list"
                    class="flex flex-1 flex-col gap-y-7"
                >
                    <li>
                        <ul
                            role="list"
                            class="-mx-2 space-y-3"
                        >
                            @foreach ($events as $event)
                                <x-sidebar.item
                                    :event="$event"
                                    :selected="$selectedEvent?->is($event) ?? false"
                                />
                            @endforeach
                        </ul>
                    </li>
                    <x-sidebar.back-to-main-website />
                </ul>
            </nav>
        </div>
    </div>

    <div class="sticky top-0 z-40 flex items-center gap-x-6 bg-gray-900 px-4 py-4 shadow-sm sm:px-6 lg:hidden">
        <button
            type="button"
            class="-m-2.5 p-2.5 text-primary-400 lg:hidden"
            x-on:click="showMobileMenu = true"
        >
            <span class="sr-only">Open sidebar</span>
            <x-heroicon-o-bars-3 class="size-6" />
        </button>
        <div class="flex-1 text-sm font-semibold leading-6 text-white">
            Awoostria Archive
        </div>
    </div>
</div>
