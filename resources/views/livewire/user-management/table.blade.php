<div>
    @section('title')
        {{ $title }}
    @endsection
    <div class="flex flex-row justify-between w-full gap-2 py-3 lg:w-3/4 items-top">
            <div class="flex flex-row items-center mb-3 space-x-4">
                <label class="text-sm font-medium text-gray-900 w-14 dark:text-white">Per Hal</label>
                <select wire:model.live='perPage'
                    class="block text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white focus:ring-blue-500 focus:border-blue-500">
                    <option value="5">5</option>
                    <option value="7">7</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                </select>
            </div>
            <livewire:user-management.create />
    </div>


    <div class="items-center w-full overflow-hidden overflow-x-auto border rounded lg:w-3/4 border-zinc-300 dark:border-zinc-700">
        <table class="w-full text-sm text-left text-neutral-600 dark:text-zinc-200">
            <thead class="text-sm border-b border-zinc-300 bg-zinc-100 text-neutral-900 dark:border-zinc-700 dark:bg-zinc-800 dark:text-zinc-50">
                <tr>
                    <th scope="col" class="p-4">#</th>
                    @include('livewire.includes.table-sortable-th',[
                        'name' => 'name',
                        'displayName' => 'Nama'
                    ])
                    {{-- @include('livewire.includes.table-sortable-th',[
                        'name' => 'email',
                        'displayName' => 'Email'
                    ]) --}}
                    <th scope="col" class="p-4">Roles</th>
                    <th scope="col" class="p-4">Permissions</th>
                    <th scope="col" class="p-4">
                        <span class="sr-only">Actions</span>
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-zinc-300 dark:divide-zinc-700">
                @forelse ($data as $item)
                <tr>
                    <td class="p-4">
                        {{ ($data->currentpage() - 1) * $data->perpage() + $loop->index + 1 }}
                    </td>
                    <td class="p-4">
                        <div class="flex items-center gap-2 w-max">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos() and $item->profile_photo_url)
                            <img class="object-cover rounded-full size-10" src="{{ $item->profile_photo_url }}" alt="{{ $item->name }}" />
                            @endif
                            <div class="flex flex-col">
                                <span class="text-neutral-900 dark:text-zinc-50">{{ $item->name }}</span>
                                <span class="text-sm text-neutral-600 opacity-85 dark:text-zinc-200">{{ $item->email }}</span>
                            </div>
                        </div>
                    </td>
                    <td class="p-4">
                        @if($item->getRoleNames()->isNotEmpty())
                        <span class="inline-flex overflow-hidden rounded border border-green-700 px-1 py-0.5 text-xs font-medium text-green-700 bg-green-700/10">
                            {{ $item->getRoleNames()->implode(',') }}
                        </span>
                        @endif
                    </td>
                    <td class="p-4">{{ $item->getPermissionNames()->implode(',') }}</td>
                    <td class="p-4">
                        <button type="button"
                            @click="$dispatch('dispatch-user-table-edit', {id: '{{ $item->id }}'})"
                            class="cursor-pointer whitespace-nowrap rounded bg-transparent p-0.5 font-semibold text-sky-700 outline-sky-700 hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 active:opacity-100 active:outline-offset-0 dark:text-sky-600 dark:outline-sky-600">
                            Edit
                        </button>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td class="p-4" colspan="5"></td>
                            Belum Ada Data
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="px-3 py-4">
            {{ $data->onEachSide(1)->links() }}
        </div>
    </div>
</div>
