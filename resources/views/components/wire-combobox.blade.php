@props(['options', 'property'])
<div x-data="{
    allOptions: @js($options),
    options: @js($options),
    isOpen: false,
    openedWithKeyboard: false,
    selectedOption: @entangle($property).live,
    setSelectedOption(option) {
        this.selectedOption = option
        this.isOpen = false
        this.openedWithKeyboard = false
        this.$refs.hiddenTextField = option
    },
    getFilteredOptions(query) {
        this.options = this.allOptions.filter((option) =>
            option.toLowerCase().includes(query.toLowerCase()),
        )
        if (this.options.length === 0) {
            this.$refs.noResultsMessage.classList.remove('hidden')
        } else {
            this.$refs.noResultsMessage.classList.add('hidden')
        }
    },
    handleKeydownOnOptions(event) {
        // if the user presses backspace or the alpha-numeric keys, focus on the search field
        if ((event.keyCode >= 65 && event.keyCode <= 90) || (event.keyCode >= 48 && event.keyCode <= 57) || event.keyCode === 8) {
            this.$refs.searchField.focus()
        }
    },
}" class="flex flex-col w-full max-w-xs gap-1" x-on:keydown="handleKeydownOnOptions($event)" x-on:keydown.esc.window="isOpen = false, openedWithKeyboard = false" x-init="options = allOptions">

<div class="relative">

    <!-- trigger button  -->
    <button type="button" class="inline-flex items-center justify-between w-full gap-2 px-4 py-2 text-sm font-medium tracking-wide transition border rounded-md border-neutral-300 bg-neutral-50 text-neutral-600 hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black dark:border-neutral-700 dark:bg-neutral-900/50 dark:text-neutral-300 dark:focus-visible:outline-white" role="combobox" aria-controls="makesList" aria-haspopup="listbox" x-on:click="isOpen = ! isOpen" x-on:keydown.down.prevent="openedWithKeyboard = true" x-on:keydown.enter.prevent="openedWithKeyboard = true" x-on:keydown.space.prevent="openedWithKeyboard = true" x-bind:aria-expanded="isOpen || openedWithKeyboard" x-bind:aria-label="selectedOption ? selectedOption.value : 'Please Select'" >
        <span class="text-sm font-normal" x-text="selectedOption ? selectedOption : 'Please Select'"></span>
        <!-- Chevron  -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"class="size-5" aria-hidden="true">
            <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"/>
        </svg>
    </button>

    <!-- Hidden Input To Grab The Selected Value  -->
    <input id="make" name="make" x-ref="hiddenTextField" hidden=""/>
    <div x-show="isOpen || openedWithKeyboard" id="makesList" class="absolute left-0 z-10 w-full overflow-hidden border rounded-md top-11 border-neutral-300 bg-neutral-50 dark:border-neutral-700 dark:bg-neutral-900" role="listbox" aria-label="industries list" x-on:click.outside="isOpen = false, openedWithKeyboard = false" x-on:keydown.down.prevent="$focus.wrap().next()" x-on:keydown.up.prevent="$focus.wrap().previous()" x-transition x-trap="openedWithKeyboard">

        <!-- Search  -->
        <div class="relative">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="1.5" class="absolute -translate-y-1/2 left-4 top-1/2 size-5 text-neutral-600/50 dark:text-neutral-300/50" aria-hidden="true" >
                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/>
            </svg>
            <input type="text" class="w-full border-b borderneutral-300 bg-neutral-50 py-2.5 pl-11 pr-4 text-sm text-neutral-600 focus:outline-none focus-visible:border-black disabled:cursor-not-allowed disabled:opacity-75 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300 dark:focus-visible:border-white" name="searchField" aria-label="Search" x-on:input="getFilteredOptions($el.value)" x-ref="searchField" placeholder="Search" />
        </div>

        <!-- Options  -->
        <ul class="flex flex-col overflow-y-auto max-h-44">
            <li class="hidden px-4 py-2 text-sm text-neutral-600 dark:text-neutral-300" x-ref="noResultsMessage">
                <span>No matches found</span>
            </li>
            <template x-for="(item, index) in options" x-bind:key="item">
                <li class="inline-flex justify-between gap-6 px-4 py-2 text-sm cursor-pointer combobox-option bg-neutral-50 text-neutral-600 hover:bg-neutral-900/5 hover:text-neutral-900 focus-visible:bg-neutral-900/5 focus-visible:text-neutral-900 focus-visible:outline-none dark:bg-neutral-900 dark:text-neutral-300 dark:hover:bg-neutral-50/5 dark:hover:text-white dark:focus-visible:bg-neutral-50/10 dark:focus-visible:text-white" role="option" x-on:click="setSelectedOption(item)" x-on:keydown.enter="setSelectedOption(item)" x-bind:id="'option-' + index" tabindex="0">
                    <!-- Label  -->
                    <span x-bind:class="selectedOption == item ? 'font-bold' : null" x-text="item"></span>
                    <!-- Screen reader 'selected' indicator  -->
                    <span class="sr-only" x-text="selectedOption == item ? 'selected' : null"></span>
                    <!-- Checkmark  -->
                    <svg x-cloak x-show="selectedOption == item" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="2" class="size-4" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5">
                    </svg>
                </li>
            </template>
        </ul>
    </div>
</div>
</div>
