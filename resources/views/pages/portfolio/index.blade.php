<x-layouts.app
    page-title="Портфолио"
>
<div class="bg-white dark:bg-gray-900 py-6 sm:py-8 lg:py-12">
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
<div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16">
    <div class="grid grid-cols-1 md:grid-cols-3 sm:grid-cols-2 gap-10">
        @forelse ($housesData->houses as $house)
        <div
            class="border-r border-b border-l border-gray-400 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r flex flex-col justify-between leading-normal"
        >
            <img src="{{ $house->imageUrl }}" class="w-full mb-3">
            <div class="p-4 pt-2">
                <div class="mb-8">
                    <p class="text-sm text-gray-600 flex items-center">
                        <svg class="fill-current text-gray-500 w-3 h-3 mr-2" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path
                                d="M4 8V6a6 6 0 1 1 12 0v2h1a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2h1zm5 6.73V17h2v-2.27a2 2 0 1 0-2 0zM7 6v2h6V6a3 3 0 0 0-6 0z">
                            </path>
                        </svg>
                        Members only
                    </p>
                    <a href="#" class="text-gray-900 font-bold text-lg mb-2 hover:text-indigo-600 inline-block">Can
                        coffee make you a better developer?</a>
                    <p class="text-gray-700 text-sm">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.</p>
                </div>
                <div class="flex items-center">
                    <a
                        href="#"><img class="w-10 h-10 rounded-full mr-4" src="{{ $house->imageUrl }}" alt="Avatar of Jonathan Reinink"></a>
                    <div class="text-sm">
                        <a href="#" class="text-gray-900 font-semibold leading-none hover:text-indigo-600">Jonathan
                            Reinink</a>
                        <p class="text-gray-600">Aug 18</p>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div><p class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Данные временно недоступны, пожалуйста попробуйте позже</p></div>
        @endforelse
    </div>
</div>
<x-panels.pagination :paginator="$housesData->houses" />
</x-layouts.app>