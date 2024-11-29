<div class="px-20 col-span-full xl:col-span-12 dark:bg-gray-800">

        <!-- Table -->
        <div class="overflow-x-auto">
            <div class="flex flex-wrap justify-between mt-5">

                @foreach ($data as $item)
                <div class="max-w-sm py-2">
                    <div class="flex flex-col h-full p-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                        <div class="flex items-center justify-between mb-3">
                            <h2 class="mr-2 text-lg font-medium text-gray-700 dark:text-white">{{ $item->name }}</h2>
                            @if($item->id != 1 || \Auth::user()->id == 1 )
                            <div>
                                <button @click="$dispatch('dispatch-roles-table-edit', {id: '{{ $item->id }}'})"
                                    class="inline-flex items-center justify-center flex-shrink-0 w-6 h-6 text-white bg-yellow-500 rounded-full dark:bg-yellow-500">
                                    <x-iconic-edit />
                                </button>
                                <button @click="$dispatch('dispatch-roles-table-delete', {id: '{{ $item->id }}', nama: '{{ $item->name }}'})"
                                    class="inline-flex items-center justify-center flex-shrink-0 w-6 h-6 text-white bg-red-500 rounded-full dark:bg-red-500">
                                    <x-iconic-trash />
                                </button>
                            </div>
                            @endif
                        </div>
                        <div class="flex flex-col justify-between flex-grow">
                            <div
                                class="inline-flex items-center mt-3 text-black dark:text-white hover:text-blue-600">
                                Pengguna:
                            </div>
                            @php
                                $role_name = $item->name;
                                $users = \App\Models\User::whereHas('roles', function($q) use($role_name) { $q->where('name', $role_name); })->pluck('name');
                            @endphp

                            <p class="text-base leading-relaxed text-gray-700 dark:text-gray-300">
                                {{ $users->implode(',')}}
                            </p>
                        </div>

                    </div>
                </div>
                @endforeach

            </div>
        </div>
</div>
