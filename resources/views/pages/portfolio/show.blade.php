<x-layouts.app
    :page-title="$house->name"
>

<div class="col-span-3 border-r-0 sm:border-r pb-4 pr-4 text-center catalog-detail-slick-preview" data-slick-carousel-detail>
    <div class="mb-4 border rounded" data-slick-carousel-detail-items>
        <img class="w-full" src="{{ $house->imageUrl }}" alt="{{ $house->name }}">
        @foreach ($house->images as $image)
        <img class="w-full" src="{{ $image->url }}" alt="{{ $house->name }}">
        @endforeach
    </div>
    <div class="flex space-x-4 justify-center items-center" data-slick-carousel-detail-pager>
    </div>
</div>

<a href="{{ route('portfolio.index') }}" class="text-xl dark:text-white">Вернуться</a>

</x-layouts.app>