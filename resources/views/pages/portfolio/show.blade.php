<x-layouts.app
    :page-title="$house->name"
>

<div class="grid grid-cols-2 md:grid-cols-3 gap-4">
    <div>
        <img class="w-full" src="{{ $house->imageUrl }}" alt="{{ $house->name }}">
    </div>
    {{--
    <div id="controls-carousel" class="relative w-full" data-carousel="static">
        <!-- Carousel wrapper -->
        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
             <!-- Item 1 -->
            @foreach ($house->images as $image)
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ $image->url }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="{{ $house->name }}">
            </div>
            @endforeach
            
        </div>
        <!-- Slider controls -->
        <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>
    --}}
    {{--
       <div class="multiple-items">
        @foreach ($house->images as $image)
        <div>
            <img src="{{ $image->url }}" class="" alt="{{ $house->name }}">
        </div>
        @endforeach
       </div>
    --}}
</div>

{{--
<div class="bg-white dark:bg-gray-900 h-screen h-full py-6 sm:py-8 lg:py-12">
    <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
        <div class="mb-4 flex items-center justify-between gap-8 sm:mb-8 md:mb-12">
            <div class="flex items-center gap-12">
                <h2 class="text-2xl font-bold text-gray-800 lg:text-3xl dark:text-white">Галерея</h2>

                <p class="hidden max-w-screen-sm text-gray-500 dark:text-gray-300 md:block">
                    This is a section of some simple filler text,
                    also known as placeholder text. It shares some characteristics of a real written text.
                </p>
            </div>

        </div>

        <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 md:gap-6 xl:gap-8">
            @foreach ($house->images as $image)
            <!-- image - start -->
            <a
                class="group relative flex h-48 items-end overflow-hidden rounded-lg bg-gray-100 shadow-lg md:h-80">
                <img src="{{ $image->url }}" loading="lazy" alt="photos of my project" class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />

                <div
                    class="pointer-events-none absolute inset-0 bg-gradient-to-t from-gray-800 via-transparent to-transparent opacity-50">
                </div>

                <span class="relative ml-4 mb-3 inline-block text-sm text-white md:ml-5 md:text-lg">VR</span>
            </a>
            <!-- image - end -->
            @endforeach
            
        </div>
    </div>
</div>
--}}

<div class="p-5 sm:p-8">
    <div class="columns-1 gap-5 sm:columns-2 sm:gap-8 md:columns-3 lg:columns-4 [&>img:not(:first-child)]:mt-8">
        @foreach ($house->images as $image)
        <img
            class="cursor-pointer"
            src="{{ $image->url }}" alt="{{ $image->id }}"
            onclick="openModal({{ $loop->index }})"
        />
        @endforeach
    </div>
</div>

<!-- Модальное окно -->
<div id="imageModal" class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center hidden z-50" onclick="closeModal()">
    <div class="relative max-w-3xl w-full" onclick="event.stopPropagation()">
        <!-- Кнопка для закрытия модального окна -->
        {{--<button class="absolute top-4 right-4 text-white text-3xl font-bold" onclick="closeModal()">&times;</button>--}}

        <button onclick="closeModal()"
            class="absolute p-1 bg-gray-100 border border-gray-300 rounded-full -top-1 -right-1"
        >
            <svg
            xmlns="http://www.w3.org/2000/svg"
            class="w-3 h-3"
            viewBox="0 0 20 20"
            fill="currentColor"
            >
            <path
                fill-rule="evenodd"
                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                clip-rule="evenodd"
            />
            </svg>
        </button>

        <img id="modalImage" src="" alt="Modal Image" class="w-full h-auto object-contain">

        <!-- Кнопки для переключения изображений -->
        <button
            id="prevButton"
            type="button"
            class="left-0 top-1/2 transform -translate-y-1/2 absolute top-0 start-0 z-30 flex items-center justify-center px-4 cursor-pointer group focus:outline-none"
            onclick="prevImage()"
        >
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button
            id="nextButton"
            type="button"
            class="right-0 top-1/2 transform -translate-y-1/2 absolute top-0 end-0 z-30 flex items-center justify-center px-4 cursor-pointer group focus:outline-none"
            onclick="nextImage()"
        >
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>
</div>

<!-- Передаем данные об изображениях в формате JSON в скрытое поле для использования в JS -->
{{--<input type="hidden" id="imageModalData" value='@json($house->images->pluck("url"))' />--}}

<div>
    <a href="{{ route('portfolio.index') }}" class="text-xl dark:text-white">Вернуться</a>
</div>

</x-layouts.app>

<script>
    let currentImageIndex = 0;
    const images = @json($house->images->pluck('url')); // Получаем пути изображений в формате JSON

    function openModal(index) {
        currentImageIndex = index;
        const modal = document.getElementById('imageModal');
        const modalImage = document.getElementById('modalImage');
        modalImage.src = images[currentImageIndex]; // Устанавливаем текущее изображение в модальное окно
        modal.classList.remove('hidden');
    }

    function closeModal() {
        const modal = document.getElementById('imageModal');
        modal.classList.add('hidden');
    }

    function prevImage() {
        currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
        document.getElementById('modalImage').src = images[currentImageIndex];
    }

    function nextImage() {
        currentImageIndex = (currentImageIndex + 1) % images.length;
        document.getElementById('modalImage').src = images[currentImageIndex];
    }

    // Закрытие модального окна при нажатии на клавишу "Esc"
    document.addEventListener('keydown', function(event) {
        if (event.key === "Escape") {
            closeModal();
        }
    });
</script>
