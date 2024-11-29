<div>
    @section('title')
        {{ $title }}
    @endsection
    <livewire:permission-management.table />
    <livewire:permission-management.edit />
    <livewire:permission-management.delete />
</div>
