<x-layouts.app
    page-title="Управление проектами"
>

<section>
    {{--https://laravel.com/docs/11.x/authorization#via-blade-templates--}}
    {{--App\Policies\HousePolicy--}}
    @can('create', \App\Model\House::class)
        <div class="my-8">
            <a href="{{ route('admin.houses.create') }}" class="" title="Добавить проект">
            <span class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                Добавить проект
            </span>
            </a>
        </div>
    @endcan

    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">id</th>
                    <th scope="col" class="px-6 py-3">Название проекта</th>
                    <th scope="col" class="px-6 py-3">Дни</th>
                    <th scope="col">&nbsp;</th>
                    <th scope="col">&nbsp;</th>
                </tr>
            </thead>

            <tbody>
            @foreach ($houses as $house)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $house->id }}</th>
                <td class="px-6 py-4">{{ $house->name }}</td>
                <td class="px-6 py-4">{{ $house->days }}</td>
                <td class="px-6 py-4">
                    @can('update', $house)
                    <div class="flex items-center">
                        <a href="{{ route('admin.houses.edit', ['house' => $house]) }}" title="Редактировать">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                        </a>
                    </div>
                    @endcan
                </td>
                <td class="px-6 py-4">
                    @can('delete', $house)
                    <form class="flex items-center" action="{{ route('admin.houses.destroy', ['house' => $house]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button
                            {{--class="inline-block bg-gray-400 hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded"--}}
                            title="удалить"
                            onclick="return confirm('Вы уверены, что хотите удалить этот проект?')"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                            </svg>
                        </button>
                    </form>
                    @endcan
                </td>
            </tr>
            @endforeach  
            </tbody>
        </table>
    </div>

</section>

</x-layouts.app>
