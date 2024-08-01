@use('App\Enums\EventResourceType')
@use('Illuminate\Database\Eloquent\Collection')
@use('App\Models\EventResource')

<div>
    <x-events-sidebar :selected-event="$this->event" />

    <main class="lg:pl-80">
        <div
            class="relative isolate overflow-hidden px-6 py-14 lg:px-8"
            style="background-color: {{ $this->event->theme_color }}"
        >
            <div class="mx-auto max-w-2xl text-center flex-row space-y-6">
                <div class="flex justify-center">
                    @if ($this->event->getLogo())
                        <img
                            src="{{ $this->event->getLogo()?->getUrl() }}"
                            class="max-h-48"
                            alt="{{ $this->event->name }}"
                        >
                    @else
                        <h2 class="text-4xl font-bold tracking-tight text-white sm:text-6xl">
                            {{ $this->event->name }}
                        </h2>
                    @endif
                </div>

                <div class="flex-row space-y-3">
                    <p class="text-2xl font-semibold leading-7 text-white">
                        {{ $this->event->location }}
                    </p>

                    <p class="text-lg leading-8 text-gray-50">
                        {{ $this->event->start_date->format('F j, Y') }} -
                        {{ $this->event->end_date->format('F j, Y') }}
                    </p>
                </div>
            </div>
        </div>

        <div class="p-6 flex flex-col gap-6">
            <x-stats>
                <x-stats.item
                    title="Total Attendees"
                    :value="$this->event->total_attendees"
                    :previous-value="$this->previousEvent?->total_attendees"
                />

                @isset($this->event->total_sponsors)
                    <x-stats.item
                        title="Sponsors"
                        :value="$this->event->total_sponsors"
                        :previous-value="$this->previousEvent?->total_sponsors"
                    />
                @endisset

                @isset($this->event->total_super_sponsors)
                    <x-stats.item
                        title="Super Sponsors"
                        :value="$this->event->total_super_sponsors"
                        :previous-value="$this->previousEvent?->total_super_sponsors"
                    />
                @endisset
            </x-stats>

            @if ($this->resourceTypes->isNotEmpty())
                <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                    <x-description-list
                        title="Resources"
                        description="The following archived resources are available for this event."
                    >
                        @foreach ($this->resourceTypes as $type => $resources)
                            @php
                                $type = EventResourceType::from($type);
                            @endphp
                            @if ($resources->count() > 1)
                                <x-description-list.multi-item :title="$type->getLabel(plural: true)">
                                    @php
                                        /** @var Collection<int, EventResource> $resources */
                                    @endphp
                                    @foreach ($resources as $resource)
                                        <x-description-list.multi-item.item
                                            :icon="$type->getIcon()"
                                            :label="$resource->label"
                                            :url="$resource->url"
                                        />
                                    @endforeach
                                </x-description-list.multi-item>
                            @else
                                @php
                                    /** @var EventResource $resource */
                                    $resource = $resources->first();
                                @endphp
                                <x-description-list.single-item
                                    :title="$type->getLabel()"
                                    :label="$resource->label"
                                    :url="$resource->url"
                                />
                            @endif
                        @endforeach
                    </x-description-list>
                </div>
            @endif
        </div>
    </main>
</div>
