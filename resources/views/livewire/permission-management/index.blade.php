<div>
    @section('title')
        {{ $title }}
    @endsection
    <div class="px-20 col-span-full xl:col-span-12 dark:bg-gray-800">
        <div class="overflow-x-auto">
            <livewire:permission-management.create />
        </div>
    </div>
    <div>
        <livewire:permission-management.table />
        <livewire:permission-management.edit />
        <livewire:permission-management.delete />
    </div>
    <div>
        <livewire:permission-management.permission.index />
    </div>
</div>
