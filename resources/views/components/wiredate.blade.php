<div wire:ignore x-data="datepicker(@entangle($attributes->wire('model')))">
    <div class="flex flex-row items-center gap-2 py-3">
        {{-- Date --}}
        <div class="relative">
            <input type="text" x-ref="dateData" x-model="selectedDate"
                class="block p-2.5 z-20 text-sm text-gray-900 bg-gray-50 rounded-lg rounded-s-gray-100 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"/>
            <button x-on:click="reset()" class="absolute top-0 end-0 p-2.5 text-sm font-medium text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">X</button>
        </div>
    </div>
</div>

@once
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script>
        document.addEventListener('alpine:init', function() {
            Alpine.data('datepicker', (model) => ({
                selectedDate: model,
                init() {
                    this.picker = flatpickr(this.$refs.dateData, {
                        dateFormat: "Y-m-d"
                    });
                    // console.log(model);
                    // this.$watch('value', function(newValue) {
                    //     this.picker.setDate(newValue);
                    //     console.log(newValue);
                    // }.bind(this)); // not working...
                },
                reset() {
                    this.selectedDate = null;
                }
            }))
        })
    </script>
@endonce
