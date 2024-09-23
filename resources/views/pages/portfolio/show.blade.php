<x-layouts.app
    :page-title="$house->name"
>




<div class="grid grid-cols-2 md:grid-cols-3 gap-4">
    <div>
        <img class="w-full" src="{{ $house->imageUrl }}" alt="{{ $house->name }}">
    </div>
    {{--
    <div>
        <iframe class="mx-auto h-full w-full" src="https://www.youtube.com/embed/hsffPST-x1k" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </div>
    --}}
    <div>
        info
    </div>
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

<!-- image -->
<div class="bg-white dark:bg-gray-900 py-6 sm:py-8 lg:py-12">
    <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
        
        <div class="mb-4 flex items-center justify-between gap-8 sm:mb-8 md:mb-12">
            <div class="flex items-center gap-12">
                <h2 class="text-2xl font-bold text-gray-800 lg:text-3xl dark:text-white">Gallery</h2>

                <p class="hidden max-w-screen-sm text-gray-500 dark:text-gray-300 md:block">
                    This is a section of some simple filler text,
                    also known as placeholder text. It shares some characteristics of a real written text.
                </p>
            </div>

            <a href="#"
                class="inline-block rounded-lg border bg-white dark:bg-gray-700 dark:border-none px-4 py-2 text-center text-sm font-semibold text-gray-500 dark:text-gray-200 outline-none ring-indigo-300 transition duration-100 hover:bg-gray-100 focus-visible:ring active:bg-gray-200 md:px-8 md:py-3 md:text-base">
                More
            </a>
        </div>
        
        <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 md:gap-6 xl:gap-8">
            @foreach ($house->images as $image)
            <!-- image - start -->
            <div
                class="group relative flex h-48 items-end overflow-hidden rounded-lg bg-gray-100 shadow-lg md:h-80">
                <img
                    src="{{ $image->url }}"
                    loading="lazy"
                    alt=""
                    class="cursor-pointer absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110"
                    onclick="openModal({{ $loop->index }})"
                />
            </div>
            <!-- image - end -->
            @endforeach
        </div>
    </div>
</div>
<!-- image -->

<!-- Модальное окно -->
<div id="imageModal" class="fixed inset-0 bg-black bg-opacity-90 flex items-center justify-center hidden z-50" onclick="closeModal()">
    <div>
        <button onclick="closeModal()"
            class="absolute top-4 right-4 text-white text-4xl font-bold z-50"
        >
            &times;
        </button>
    </div>
    <div class="relative max-w-5xl w-full h-full flex items-center justify-center">
        <div onclick="event.stopPropagation()" id="zoomContainer" class="relative overflow-hidden">
            <img id="modalImage" src="" alt="Modal Image" class="max-w-full max-h-full object-contain" style="transition: transform 0.2s ease;">
        </div>
    </div>
    <!-- Кнопки для переключения изображений -->
    <div onclick="event.stopPropagation()" class="absolute start-0 flex h-3/4 px-4">
        <button onclick="prevImage()" class="absolute left-0 flex items-center justify-center h-full px-4 z-50">
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-gray-300/70 hover:bg-gray-300/50 text-white">
                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
    </div>
    <div onclick="event.stopPropagation()" class="absolute end-0 flex h-3/4 px-4">
        <button onclick="nextImage()" class="absolute right-0 flex items-center justify-center h-full px-4 z-50">
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-gray-300/70 hover:bg-gray-300/50 text-white">
                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
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

<div class="fixed bottom-4 right-4 hidden" id="scrollToTop">
    <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full shadow-lg">
        ↑ Наверх
    </button>
</div>


</x-layouts.app>

<script>
    let currentImageIndex = 0;
    const images = @json($house->images->pluck('url')); // Получаем пути изображений в формате JSON
    let scale = 1;

    function openModal(index) {
        currentImageIndex = index;
        const modal = document.getElementById('imageModal');
        const modalImage = document.getElementById('modalImage');
        modalImage.src = images[currentImageIndex]; // Устанавливаем текущее изображение в модальное окно
        modal.classList.remove('hidden');
        resetZoom();
        document.body.style.overflow = 'hidden'; // Отключаем прокрутку страницы
    }

    function closeModal() {
        const modal = document.getElementById('imageModal');
        modal.classList.add('hidden');
        document.body.style.overflow = ''; // Включаем прокрутку страницы
    }

    function prevImage() {
        currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
        document.getElementById('modalImage').src = images[currentImageIndex];
        resetZoom();
    }

    function nextImage() {
        currentImageIndex = (currentImageIndex + 1) % images.length;
        document.getElementById('modalImage').src = images[currentImageIndex];
        resetZoom();
    }

    // Закрытие модального окна при нажатии на клавишу "Esc"
    document.addEventListener('keydown', function(event) {
        if (event.key === "Escape") {
            closeModal();
        }
    });

    function resetZoom() {
        scale = 1;
        const zoomContainer = document.getElementById('zoomContainer');
        zoomContainer.style.transform = `scale(${scale})`;
        zoomContainer.style.transformOrigin = 'center center';
        //modalImage.style.cursor = 'default';
    }

    document.getElementById('zoomContainer').addEventListener('wheel', function(e) {
        e.preventDefault();
        const delta = e.deltaY;
        const zoomStep = 0.1;

        if (delta < 0 && scale < 3) {
            scale += zoomStep;
        } else if (delta > 0 && scale > 1) {
            scale -= zoomStep;
        }

        const offsetX = e.offsetX;
        const offsetY = e.offsetY;

        this.style.transform = `scale(${scale})`;
        this.style.transformOrigin = `${offsetX}px ${offsetY}px`;
    });
</script>
