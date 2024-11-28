<div>
    @section('title')
        {{ $title }}
    @endsection
    <div class="flex flex-row items-center gap-2 py-3">
        <x-wiredate wire:model.live="startDate"/>
        <x-wiredate wire:model.live="endDate"/>
        {{ $startDate }} - {{ $endDate }}
        <x-wire-combobox :options="$options" property="merk" />
        {{ $merk }}
    </div>


    <div class="w-full overflow-hidden overflow-x-auto border rounded border-zinc-300 dark:border-zinc-700">
        <table class="w-full text-sm text-left text-neutral-600 dark:text-zinc-200">
            <thead class="text-sm border-b border-zinc-300 bg-zinc-100 text-neutral-900 dark:border-zinc-700 dark:bg-zinc-800 dark:text-zinc-50">
                <tr>
                    <th scope="col" class="p-4">User</th>
                    <th scope="col" class="p-4">ID</th>
                    <th scope="col" class="p-4">Member Since</th>
                    <th scope="col" class="p-4">Status</th>
                    <th scope="col" class="p-4">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-zinc-300 dark:divide-zinc-700">
                <tr>
                    <td class="p-4">
                        <div class="flex items-center gap-2 w-max">
                            <img class="object-cover rounded-full size-10" src="https://penguinui.s3.amazonaws.com/component-assets/avatar-8.webp" alt="user avatar" />
                            <div class="flex flex-col">
                                <span class="text-neutral-900 dark:text-zinc-50">Alice Brown</span>
                                <span class="text-sm text-neutral-600 opacity-85 dark:text-zinc-200">alice.brown@gmail.com</span>
                            </div>
                        </div>
                    </td>
                    <td class="p-4">2335</td>
                    <td class="p-4">Nov 14, 2021</td>
                    <td class="p-4"><span class="inline-flex overflow-hidden rounded border border-green-700 px-1 py-0.5 text-xs font-medium text-green-700 bg-green-700/10">Active</span></td>
                    <td class="p-4"><button type="button" class="cursor-pointer whitespace-nowrap rounded bg-transparent p-0.5 font-semibold text-sky-700 outline-sky-700 hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 active:opacity-100 active:outline-offset-0 dark:text-sky-600 dark:outline-sky-600">Edit</button></td>
                </tr>
                <tr>
                    <td class="p-4">
                        <div class="flex items-center gap-2 w-max">
                            <img class="object-cover rounded-full size-10" src="https://penguinui.s3.amazonaws.com/component-assets/avatar-1.webp" alt="user avatar" />
                            <div class="flex flex-col">
                                <span class="text-neutral-900 dark:text-zinc-50">Bob Johnson</span>
                                <span class="text-sm text-neutral-600 opacity-85 dark:text-zinc-200">johnson.bob@penguinui.com</span>
                            </div>
                        </div>
                    </td>
                    <td class="p-4">2338</td>
                    <td class="p-4">Aug 20, 2020</td>
                    <td class="p-4"><span class="inline-flex overflow-hidden rounded border border-green-700 px-1 py-0.5 text-xs font-medium text-green-700 bg-green-700/10">Active</span></td>
                    <td class="p-4"><button type="button" class="cursor-pointer whitespace-nowrap rounded bg-transparent p-0.5 font-semibold text-sky-700 outline-sky-700 hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 active:opacity-100 active:outline-offset-0 dark:text-sky-600 dark:outline-sky-600">Edit</button></td>
                </tr>
                <tr>
                    <td class="p-4">
                        <div class="flex items-center gap-2 w-max">
                            <img class="object-cover rounded-full size-10" src="https://penguinui.s3.amazonaws.com/component-assets/avatar-2.webp" alt="user avatar" />
                            <div class="flex flex-col">
                                <span class="text-neutral-900 dark:text-zinc-50">Ryan Thompson</span>
                                <span class="text-sm text-neutral-600 opacity-85 dark:text-zinc-200">ryan.thompson@penguinui.com</span>
                            </div>
                        </div>
                    </td>
                    <td class="p-4">2346</td>
                    <td class="p-4">Feb 5, 2022</td>
                    <td class="p-4"><span class="inline-flex overflow-hidden rounded border border-red-700 px-1 py-0.5 text-xs font-medium text-red-700 bg-red-700/10">Canceled</span></td>
                    <td class="p-4"><button type="button" class="cursor-pointer whitespace-nowrap rounded bg-transparent p-0.5 font-semibold text-sky-700 outline-sky-700 hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 active:opacity-100 active:outline-offset-0 dark:text-sky-600 dark:outline-sky-600">Edit</button></td>
                </tr>
                <tr>
                    <td class="p-4">
                        <div class="flex items-center gap-2 w-max">
                            <img class="object-cover rounded-full size-10" src="https://penguinui.s3.amazonaws.com/component-assets/avatar-4.webp" alt="user avatar" />
                            <div class="flex flex-col">
                                <span class="text-neutral-900 dark:text-zinc-50">Emily Rodriguez</span>
                                <span class="text-sm text-neutral-600 opacity-85 dark:text-zinc-200">emily.rodriguez@penguinui.com</span>
                            </div>
                        </div>
                    </td>
                    <td class="p-4">2349</td>
                    <td class="p-4">Jun 14, 2022</td>
                    <td class="p-4"><span class="inline-flex overflow-hidden rounded border border-green-700 px-1 py-0.5 text-xs font-medium text-green-700 bg-green-700/10">Active</span></td>
                    <td class="p-4"><button type="button" class="cursor-pointer whitespace-nowrap rounded bg-transparent p-0.5 font-semibold text-sky-700 outline-sky-700 hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 active:opacity-100 active:outline-offset-0 dark:text-sky-600 dark:outline-sky-600">Edit</button></td>
                </tr>
                <tr>
                    <td class="p-4">
                        <div class="flex items-center gap-2 w-max">
                            <img class="object-cover rounded-full size-10" src="https://penguinui.s3.amazonaws.com/component-assets/avatar-7.webp" alt="user avatar" />
                            <div class="flex flex-col">
                                <span class="text-neutral-900 dark:text-zinc-50">Alex Martinez</span>
                                <span class="text-sm text-neutral-600 opacity-85 dark:text-zinc-200">alex.martinez@penguinui.com</span>
                            </div>
                        </div>
                    </td>
                    <td class="p-4">2345</td>
                    <td class="p-4">Sep 17, 2018</td>
                    <td class="p-4"><span class="inline-flex overflow-hidden rounded border border-green-700 px-1 py-0.5 text-xs font-medium text-green-700 bg-green-700/10">Active</span></td>
                    <td class="p-4"><button type="button" class="cursor-pointer whitespace-nowrap rounded bg-transparent p-0.5 font-semibold text-sky-700 outline-sky-700 hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 active:opacity-100 active:outline-offset-0 dark:text-sky-600 dark:outline-sky-600">Edit</button></td>
                </tr>
            </tbody>
        </table>
    </div>

</div>

