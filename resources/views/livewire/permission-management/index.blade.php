<div>
    @section('title')
        {{ $title }}
    @endsection
    <div x-data="{ selectedTab: 'groups' }" class="w-full">
        <div @keydown.right.prevent="$focus.wrap().next()" @keydown.left.prevent="$focus.wrap().previous()"
            class="flex gap-2 overflow-x-auto border-b border-stone-300 dark:border-stone-700" role="tablist"
            aria-label="tab options">
            <button @click="selectedTab = 'groups'" :aria-selected="selectedTab === 'groups'"
                :tabindex="selectedTab === 'groups' ? '0' : '-1'"
                :class="selectedTab === 'groups' ?
                    'font-bold text-amber-500 border-b-2 border-amber-500 dark:border-amber-400 dark:text-amber-400' :
                    'text-stone-800 font-medium dark:text-stone-300 dark:hover:border-b-blue-500 dark:hover:text-white hover:border-b-2 hover:border-b-blue-600 hover:text-black'"
                class="flex items-center gap-2 px-4 py-2 text-sm h-min" type="button" role="tab"
                aria-controls="tabpanelGroups">
                <x-iconic-users-plus class="size-6"/>
                Roles
                <span
                    :class="selectedTab === 'groups' ?
                        'border-amber-500 bg-amber-500/10 dark:bg-amber-400 dark:border-amber-400 dark:text-black' :
                        'border-stone-300 dark:border-stone-700 bg-stone-200 dark:bg-stone-900'"
                    class="px-1 text-xs font-medium rounded-full">{{ $jml_roles }}</span>
            </button>
            <button @click="selectedTab = 'likes'" :aria-selected="selectedTab === 'likes'"
                :tabindex="selectedTab === 'likes' ? '0' : '-1'"
                :class="selectedTab === 'likes' ?
                    'font-bold text-amber-500 border-b-2 border-amber-500 dark:border-amber-400 dark:text-amber-400' :
                    'text-stone-800 font-medium dark:text-stone-300 dark:hover:border-b-blue-500 dark:hover:text-white hover:border-b-2 hover:border-b-blue-600 hover:text-black'"
                class="flex items-center gap-2 px-4 py-2 text-sm h-min" type="button" role="tab"
                aria-controls="tabpanelLikes">
                <x-iconic-user-check class="size-6"/>
                Permissions
                <span
                    :class="selectedTab === 'likes' ?
                        'border-amber-500 bg-amber-500/10 dark:bg-amber-400 dark:border-amber-400 dark:text-black' :
                        'border-stone-300 dark:border-stone-700 bg-stone-200 dark:bg-stone-900'"
                    class="px-1 text-xs font-medium rounded-full">{{ $jml_permissions }}</span>
            </button>
        </div>
        <div class="px-2 py-4 text-stone-800 dark:text-stone-300">
            <div x-show="selectedTab === 'groups'" id="tabpanelGroups" role="tabpanel" aria-label="groups">
                <livewire:permission-management.create />
                <div>
                    <livewire:permission-management.table />
                    <livewire:permission-management.edit />
                    <livewire:permission-management.delete />
                </div>
            </div>
            <div x-show="selectedTab === 'likes'" id="tabpanelLikes" role="tabpanel" aria-label="likes">
                <livewire:permission-management.permission.index />
            </div>
        </div>
    </div>
</div>
