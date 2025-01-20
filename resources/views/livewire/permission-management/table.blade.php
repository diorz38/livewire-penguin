<div class="grid grid-cols-1 gap-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-6">
    @foreach ($data as $item)
        <div class="max-w-sm py-2">
            <div class="flex flex-col h-full p-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <div class="flex items-center justify-between w-full mb-3">
                    <h2 class="mr-2 text-lg font-medium text-gray-700 dark:text-white">{{ $item->name }}</h2>
                    @if (
                        $item->name != 'super-admin' ||
                            $item->name != 'admin' ||
                            \Auth::user()->roles == 'admin' ||
                            \Auth::user()->roles == 'super-admin')
                        <div>
                            <button @click="$dispatch('dispatch-roles-table-edit', {id: '{{ $item->id }}'})"
                                class="inline-flex items-center justify-center flex-shrink-0 w-6 h-6 text-white bg-yellow-500 rounded-full dark:bg-yellow-500">
                                <x-iconic-edit />
                            </button>
                            <button
                                @click="$dispatch('dispatch-roles-table-delete', {id: '{{ $item->id }}', nama: '{{ $item->name }}'})"
                                class="inline-flex items-center justify-center flex-shrink-0 w-6 h-6 text-white bg-red-500 rounded-full dark:bg-red-500">
                                <x-iconic-trash />
                            </button>
                        </div>
                    @endif
                </div>
                <div class="flex flex-col justify-between flex-grow">
                    <div class="inline-flex items-center mt-3 text-black dark:text-white hover:text-blue-600">
                        Pengguna:
                    </div>
                    @php
                        $role_name = $item->name;
                        $users = \App\Models\User::whereHas('roles', function ($q) use ($role_name) {
                            $q->where('name', $role_name);
                        })->pluck('name');
                    @endphp

                    <p class="text-base leading-relaxed text-gray-700 dark:text-gray-300">
                        {{ $users->implode(',') }}
                    </p>
                </div>

            </div>
        </div>
    @endforeach
</div>
