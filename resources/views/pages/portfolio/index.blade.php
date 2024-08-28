<x-layouts.app
    page-title="Портфолио"
>

@forelse ($houses as $house)
    <div class="w-full flex">
        <div class="px-4 leading-normal">
            <div class="mb-8 space-y-2">
                <div class="text-black font-bold text-xl">  {{-- $post->title --}}
                    <a class="hover:text-orange" href="{{ route('portfolio.show', ['house' => $house->id]) }}">{{ $house->name }}</a>
                </div>
                <div class="flex items-center">
                    <img class="h-auto max-w-full" src="{{ $house->imageUrl }}" alt="image description">
                </div>
            </div>
        </div>
    </div>
@empty
    <div><p class="text-black text-xl">Данные временно недоступны, пожалуйста попробуйте позже</p></div>
@endforelse

</x-layouts.app>