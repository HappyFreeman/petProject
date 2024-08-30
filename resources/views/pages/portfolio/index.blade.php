<x-layouts.app
    page-title="Портфолио"
>
<div class="grid grid-cols-2 md:grid-cols-3 gap-4">
@forelse ($housesData->houses as $house)
    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <a href="{{ route('portfolio.show', ['house' => $house->id]) }}">
            <img class="rounded-t-lg" src="{{ $house->imageUrl }}" alt="" />
        </a>
        <div class="p-5">
            <a href="{{ route('portfolio.show', ['house' => $house->id]) }}">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $house->name }}</h5>
            </a>
            {{--<p class="mb-3 font-normal text-gray-700 dark:text-gray-400">какой то ещё текст</p>--}}
            <a href="{{ route('portfolio.show', ['house' => $house->id]) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Подробнее
            </a>
        </div>
    </div>
@empty
    <div><p class="text-black text-xl">Данные временно недоступны, пожалуйста попробуйте позже</p></div>
@endforelse
</div>

</x-layouts.app>