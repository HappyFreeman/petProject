<x-layouts.app
    page-title="Портфолио"
>

<div class="bg-white dark:bg-gray-900 py-6 sm:py-8 lg:py-12">
    <x-panels.house.filter 
    class="mb-3"
    method="GET"
    :filter-values="$housesData->filter"
/>
    <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
        <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 md:gap-6 xl:gap-8">
            @forelse ($housesData->houses as $house)
            <!-- image - start -->
            <a href="{{ route('portfolio.show', ['house' => $house->id]) }}"
                class="group relative flex h-48 items-end overflow-hidden rounded-lg bg-gray-100 shadow-lg md:h-80">
                <img src="{{ $house->imageUrl }}" loading="lazy" alt="" class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />

                <div
                    class="pointer-events-none absolute inset-0 bg-gradient-to-t from-gray-800 via-transparent to-transparent opacity-50">
                </div>

                <span class="relative ml-4 mb-3 inline-block text-sm text-white md:ml-5 md:text-lg">{{ $house->name }}</span>
            </a>
            <!-- image - end -->
            @empty
            <div><p class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Данные временно недоступны, пожалуйста попробуйте позже</p></div>
            @endforelse
        </div>
    </div>
</div>
<x-panels.pagination :paginator="$housesData->houses" />
</x-layouts.app>