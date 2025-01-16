<div class="col-span-full xl:col-span-12 dark:bg-gray-600">

        <!-- Table -->
        <div class="overflow-x-auto">
            <div class="flex flex-wrap justify-start mt-5">

                @foreach ($data as $item)
                <div class="max-w-sm py-6 pr-4">
                    <div class="flex flex-col h-full p-2 bg-white rounded-lg shadow-sm dark:bg-gray-800">
                        <div class="flex items-center">
                            <h2 class="mr-2 text-lg font-medium text-gray-700 dark:text-white">{{ $item->name }}</h2>
                            <button @click="$dispatch('dispatch-permissions-table-edit', {id: '{{ $item->id }}'})"
                                class="inline-flex items-center justify-center flex-shrink-0 w-6 h-6 text-white bg-yellow-500 rounded-full dark:bg-yellow-500">
                                <x-iconic-edit />
                            </button>
                            <button @click="$dispatch('dispatch-permissions-table-delete', {id: '{{ $item->id }}', nama: '{{ $item->name }}'})"
                                class="inline-flex items-center justify-center flex-shrink-0 w-6 h-6 text-white bg-red-500 rounded-full dark:bg-red-500">
                                <x-iconic-trash />
                            </button>

                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            {{ $data->onEachSide(1)->links() }}
        </div>
    {{-- </div> --}}
</div>
